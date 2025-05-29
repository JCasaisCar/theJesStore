<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomResetPasswordMail;

class CustomResetPassword extends Notification
{
    public $token;
    public $email;

    public function __construct($token, $email = null)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $this->email ?? $notifiable->getEmailForPasswordReset(),
        ], false));

        $html = View::make('emails.reset-password', [
            'url' => $url,
            'user' => $notifiable,
        ])->render();

        $cssPath = public_path('css/email/reset-password.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';

        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        return (new CustomResetPasswordMail(
            '🔐 Recupera tu contraseña - TheJesStore',
            $inlinedHtml
        ))->to($notifiable->email);
    }
}