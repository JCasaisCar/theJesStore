<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomNewsletterUnsubscribedMail;

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
        $html = View::make('emails.newsletter-unsubscribed', [
            'email' => $this->email,
        ])->render();

        $cssPath = public_path('css/email/newsletter-unsubscribed.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';

        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        return (new CustomNewsletterUnsubscribedMail(
            '📭 Confirmación de baja de la newsletter',
            $inlinedHtml
        ))->to($this->email);
    }
}