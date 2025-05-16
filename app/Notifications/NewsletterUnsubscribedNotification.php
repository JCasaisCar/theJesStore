<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewsletterUnsubscribedNotification extends Notification
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
            ->subject('Confirmación de baja de la newsletter')
            ->view('emails.newsletter-unsubscribed', [
                'email' => $this->email,
            ]);
    }
}