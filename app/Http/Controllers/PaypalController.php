<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function pay(Request $request)
{
    $clientId = config('services.paypal.client_id');
    $secret = config('services.paypal.secret');
    $currency = config('services.paypal.currency');

    $amount = $request->input('amount', 10); // ← igual que en Stripe

    // Obtener token
    $response = Http::withBasicAuth($clientId, $secret)
        ->asForm()
        ->post('https://api-m.sandbox.paypal.com/v1/oauth2/token', [
            'grant_type' => 'client_credentials',
        ]);

    $accessToken = $response['access_token'];

    // Crear orden
    $order = Http::withToken($accessToken)
        ->post('https://api-m.sandbox.paypal.com/v2/checkout/orders', [
            'intent' => 'CAPTURE',
            'purchase_units' => [[
                'amount' => [
                    'currency_code' => $currency,
                    'value' => number_format($amount, 2, '.', ''),
                ]
            ]],
            'application_context' => [
                'return_url' => route('confirm.success', ['method' => 'paypal']),
                'cancel_url' => url('/cancel'),
            ]
        ]);

    return redirect($order['links'][1]['href']);
}
}