<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Notifications\CommentEmailNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TicketController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
        ]);

        $request->request->add([
            'category_id'   => 1,
            'status_id'     => 1,
            'priority_id'   => 1
        ]);

        $ticket = Ticket::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $ticket->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->back()->withStatus('Your ticket has been submitted, we will be in touch. You can view ticket status <a href="'.route('tickets.show', $ticket->id).'">here</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  Ticket  $ticket
     * @return View
     */
    public function show(Ticket $ticket): View
    {
        $ticket->load('comments');

        return view('tickets.show', compact('ticket'));
    }

    /**
     * Store a comment for the specified ticket.
     *
     * @param  Request  $request
     * @param  Ticket  $ticket
     * @return RedirectResponse
     */
    public function storeComment(Request $request, Ticket $ticket): RedirectResponse
    {
        $request->validate([
            'comment_text' => 'required'
        ]);

        $comment = $ticket->comments()->create([
            'author_name'   => $ticket->author_name,
            'author_email'  => $ticket->author_email,
            'comment_text'  => $request->comment_text
        ]);

        $ticket->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Your comment added successfully');
    }
}
