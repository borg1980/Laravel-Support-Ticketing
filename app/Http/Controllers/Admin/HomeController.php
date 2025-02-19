<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Ticket;

class HomeController
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $totalTickets = Ticket::count();
        $openTickets = Ticket::whereHas('status', function($query): void {
            $query->whereIn('id', array(1, 2, 3));// New, In Progress, Resolved
        })->count();
        $closedTickets = Ticket::whereHas('status', function($query): void {
            $query->whereName('Closed');
        })->count();

        return view('home', compact('totalTickets', 'openTickets', 'closedTickets'));
    }
}
