<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;

class ContactUserConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        // Renderiza la vista HTML sin etiquetas style
        $html = View::make('emails.contact.user', [
            'contact' => $this->contact,
        ])->render();

        // Obtener y aplicar estilos
        $cssPath = public_path('css/email/contact-user.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        // Retornar el correo con asunto y HTML completo
        return $this->subject('Hemos recibido tu mensaje en TheJesStore')
                    ->html($inlinedHtml);
    }
}