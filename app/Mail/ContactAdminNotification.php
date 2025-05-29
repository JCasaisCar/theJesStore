<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;

class ContactAdminNotification extends Mailable
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
        $html = View::make('emails.contact.admin', [
            'contact' => $this->contact,
        ])->render();

        // Aplica estilos desde CSS externo
        $cssPath = public_path('css/email/contact-admin.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        // Devuelve el correo final con HTML renderizado
        return $this->subject('Nuevo mensaje de contacto recibido en TheJesStore')
                    ->html($inlinedHtml);
    }
}