<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomVerifyEmailMail;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends Notification
{
    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail']; // Laravel seguirá el flujo normal
    }

    public function toMail($notifiable)
    {
        // Generar enlace firmado
        $url = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $this->user->getKey(),
                'hash' => sha1($this->user->getEmailForVerification()),
            ]
        );

        // Cargar la plantilla Blade
        $html = View::make('emails.verify-email', [
            'user' => $this->user,
            'verificationUrl' => $url,
        ])->render();

        // Cargar el CSS externo y aplicarlo como inline
        $cssPath = public_path('css/email/verify-email.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        // Retornar directamente el mailable como tú haces
        return (new CustomVerifyEmailMail(
            '✅ Confirma tu correo electrónico - TheJesStore',
            $inlinedHtml
        ))->to($notifiable->email);
    }
}