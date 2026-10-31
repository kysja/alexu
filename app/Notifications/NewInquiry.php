<?php

namespace App\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInquiry extends Notification
{
    use Queueable;

    public function __construct(public Inquiry $inquiry)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $inquiry = $this->inquiry;

        return (new MailMessage)
            ->subject("New inquiry: {$inquiry->business}")
            ->replyTo($inquiry->email, $inquiry->name)
            ->line("**Name:** {$inquiry->name}")
            ->line("**Business:** {$inquiry->business}")
            ->line("**Team size:** {$inquiry->team_size}")
            ->line("**Email:** {$inquiry->email}")
            ->line('**Phone:** '.($inquiry->phone ?: '—'))
            ->line('**What they need:**')
            ->line($inquiry->needs);
    }
}
