<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CustomResetPasswordMail extends Mailable
{
    public $subjectLine;
    public $htmlContent;

    public function __construct(string $subjectLine, string $htmlContent)
    {
        $this->subjectLine = $subjectLine;
        $this->htmlContent = $htmlContent;
    }

    public function build()
    {
        return $this
            ->subject($this->subjectLine)
            ->html($this->htmlContent);
    }
}