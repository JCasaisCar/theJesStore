<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomNewsletterWelcomeMail;

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
        $html = View::make('emails.newsletter-welcome', [
            'email' => $this->email,
        ])->render();

        $cssPath = public_path('css/email/newsletter-welcome.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';

        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        return (new CustomNewsletterWelcomeMail(
            '📰 ¡Gracias por suscribirte a TheJesStore!',
            $inlinedHtml
        ))->to($this->email);
    }
}