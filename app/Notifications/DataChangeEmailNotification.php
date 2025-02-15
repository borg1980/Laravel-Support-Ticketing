<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class DataChangeEmailNotification extends Notification
{
    use Queueable;

    protected $data = null;
    protected $ticket = null;

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->ticket = $data['ticket'];
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject($this->data['action'])
            ->greeting('Hi,')
            ->line($this->data['action'])
            ->line("Customer: ".$this->ticket->author_name)
            ->line("Ticket name: ".$this->ticket->title)
            ->line("Brief description: ".Str::limit($this->ticket->content, 200))
            ->action('View full ticket', route('admin.tickets.show', $this->ticket->id))
            ->line('Thank you')
            ->line(config('app.name') . ' Team')
            ->salutation(' ');
    }
}
