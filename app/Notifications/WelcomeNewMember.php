<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNewMember extends Notification
{
    use Queueable;

    public function __construct(public User $user) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Welcome to Afemai Association of Canada 🇨🇦')
            ->greeting("Dear {$this->user->name},")
            ->line("🎉 Welcome to the Afemai Association of Canada!")
            ->line("We’re excited to have you join our vibrant and growing community of members dedicated to unity, support, and cultural celebration.")
            ->line("Here’s what you can do next:")
            ->line("• Connect with other members")
            ->line("• Stay updated on upcoming events")
            ->line("• Participate in community programs")
            ->action('Visit website', url('/'))
            ->line("If you have any questions, feel free to reply to this email or reach out through our contact page.")
            ->salutation('Warm regards,  
Afemai Association Team');
    }
}
