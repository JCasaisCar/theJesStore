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
        return (new MailMessage)
            ->subject('¡Gracias por suscribirte a TheJesStore!')
            ->view('emails.newsletter-welcome', [
                'email' => $this->email,
            ]);
    }
}