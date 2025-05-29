<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;

class ContactUserResponse extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    /**
     * Create a new message instance.
     */
    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        // Renderiza la vista HTML sin etiquetas style
        $html = View::make('emails.contact.response', [
            'contact' => $this->contact,
        ])->render();

        // Aplica estilos desde el archivo CSS externo
        $cssPath = public_path('css/email/contact-response.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        // Devuelve el correo renderizado con el HTML completo
        return $this->subject('Respuesta a tu mensaje en TheJesStore')
                    ->html($inlinedHtml);
    }
}