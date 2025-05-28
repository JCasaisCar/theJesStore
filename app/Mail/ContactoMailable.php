<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    public function build()
{
    // Cargar el contenido del archivo style.css
    $style = file_get_contents(public_path('css/style.css'));

    return $this->subject($this->datos['asunto'])
        ->view('emails.contact.admin') // asegúrate de que sea la vista correcta
        ->with([
            'datos' => $this->datos,
            'style' => $style, // Pasamos el contenido CSS como variable
        ]);
}
}