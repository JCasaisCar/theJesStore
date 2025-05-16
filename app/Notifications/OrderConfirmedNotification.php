<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class OrderConfirmedNotification extends Notification
{
    public $order;
    public $invoiceUrl;

    public function __construct($order, $invoiceUrl)
    {
        $this->order = $order;
        $this->invoiceUrl = $invoiceUrl;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmación de tu pedido en TheJesStore')
            ->view('emails.order-confirmed', [
                'user' => $notifiable,
                'order' => $this->order,
                'invoiceUrl' => $this->invoiceUrl,
            ]);
    }
}