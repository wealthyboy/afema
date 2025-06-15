<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserRegistered extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private User $newUser) {}

    public function via($notifiable): array
    {
        return ['mail'];   // add Slack, etc. if you like
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New registration')
            ->greeting('Hello Admin,')
            ->line("A new user ({$this->newUser->name} {$this->newUser->last_name}) just registered.")
            ->line("Email: {$this->newUser->email}")
            ->action('View Profile', url("/admin/users"));
    }

    public function toArray($notifiable): array
    {
        return [
            'user_id' => $this->newUser->id,
            'name'    => $this->newUser->name,
            'email'   => $this->newUser->email,
        ];
    }
}
