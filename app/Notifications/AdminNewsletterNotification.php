<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AdminNewsletterNotification extends Notification
{
    public $subject;
    public $body;
    public $email;

    public function __construct($subject, $body, $email)
    {
        $this->subject = $subject;
        $this->body = $body;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->subject)
            ->view('emails.admin-newsletter', [
                'subject' => $this->subject,
                'body' => $this->body,
                'email' => $this->email,
            ]);
    }
}