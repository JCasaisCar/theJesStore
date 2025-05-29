<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomAdminNewsletterMail;

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
        $html = View::make('emails.admin-newsletter', [
            'subject' => $this->subject,
            'body' => $this->body,
            'email' => $this->email,
        ])->render();

        $cssPath = public_path('css/email/admin-newsletter.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        return (new CustomAdminNewsletterMail(
            $this->subject,
            $inlinedHtml
        ))->to($this->email);
    }
}