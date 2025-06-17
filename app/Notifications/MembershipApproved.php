<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Setting;


class MembershipApproved extends Notification
{
    use Queueable;

    public function __construct(public User $user) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $setting = Setting::first();
        $pdfPath = public_path($setting->pdf_path);
        return (new MailMessage)
            ->subject('Your Afemai Membership Has Been Approved ✅')
            ->greeting("Dear {$this->user->name},")
            ->line('🎉 Congratulations! Your membership with the **Afemai Association of Canada** has been officially approved.')
            ->line('You now have full access to all member privileges, events, and community features.')
            ->line('We’ re thrilled to have you onboard and look forward to your participation.')
            ->line('If you have any questions or need support, feel free to reach out.')
            ->salutation('Warm regards,  Afemai Association Team')
            ->attach($pdfPath, [
                'as' => 'AAC_Constitution.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}
