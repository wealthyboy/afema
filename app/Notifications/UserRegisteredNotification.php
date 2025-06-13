<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Setting;

class UserRegisteredNotification extends Notification implements ShouldQueue // Implement ShouldQueue for better performance
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function __construct() {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Get the path to the PDF

        $setting = Setting::first();
        $pdfPath = public_path($setting->pdf_path);


        return (new MailMessage)
            ->subject('Welcome to  AAC!')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Welcome to Afemai Association of Canada! We are absolutely thrilled to have you join our growing community.')
            ->line('To help you get started and understand the core values, rules, and guidelines of our group, we have attached our official Group Constitution to this email.')
            ->line('We encourage you to take a moment to review it as it outlines important information about how we operate, our shared goals, and what it means to be a part of our group.')
            ->line('If you have any questions after reading it, or if you simply want to say hello, please don\'t hesitate to contact us.')
            ->line('We look forward to your contributions and involvement!')
            ->salutation('Warm regards,')
            ->line('The AAC Team')
            ->attach($pdfPath, [
                'as' => 'AAC_Constitution.pdf',
                'mime' => 'application/pdf',
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
