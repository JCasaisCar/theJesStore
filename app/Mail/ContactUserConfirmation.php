<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\ContactMessage;

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
        return $this->subject('Hemos recibido tu mensaje en TheJesStore')
                    ->markdown('emails.contact.user')
                    ->with([
                        'contact' => $this->contact,
                    ]);
    }
}