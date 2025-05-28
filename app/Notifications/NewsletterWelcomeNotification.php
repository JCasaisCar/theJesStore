<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewsletterWelcomeNotification extends Notification
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
                    $style = file_get_contents(public_path('css/style.css'));

        return (new MailMessage)
            ->subject('¡Gracias por suscribirte a TheJesStore!')
            ->view('emails.newsletter-welcome', [
                'email' => $this->email,
            'style' => $style,
            ]);
    }
}