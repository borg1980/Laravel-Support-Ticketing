<?php

namespace App\Http\Requests;

use App\Models\Ticket;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTicketRequest extends FormRequest
{
    public function authorize(): bool
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules(): array
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tickets,id',
        ];
    }
}
