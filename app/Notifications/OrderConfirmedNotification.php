<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Pelago\Emogrifier\CssInliner;
use App\Mail\CustomOrderConfirmedMail;

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
        // Render Blade con datos
        $html = View::make('emails.order-confirmed', [
            'user' => $notifiable,
            'order' => $this->order,
            'invoiceUrl' => $this->invoiceUrl,
        ])->render();

        // Cargar y aplicar CSS inline
        $cssPath = public_path('css/email/order-confirmed.css');
        $css = File::exists($cssPath) ? File::get($cssPath) : '';
        $inlinedHtml = CssInliner::fromHtml($html)->inlineCss($css)->render();

        // Retornar mailable
        return (new CustomOrderConfirmedMail(
            '📦 Confirmación de tu pedido - TheJesStore',
            $inlinedHtml
        ))->to($notifiable->email);
    }
}