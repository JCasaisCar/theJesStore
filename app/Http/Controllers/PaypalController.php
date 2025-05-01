<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

class PaypalController extends Controller
{
public function redirect()
{
    $client = new PayPalHttpClient(new SandboxEnvironment(
        config('services.paypal.client_id'),
        config('services.paypal.secret')
    ));

    $request = new OrdersCreateRequest();
    $request->prefer('return=representation');
    $request->body = [
        "intent" => "CAPTURE",
        "purchase_units" => [[
            "amount" => [
                "currency_code" => "EUR",
                "value" => "100.00" // <-- puedes poner $total aquí
            ]
        ]],
        "application_context" => [
            "cancel_url" => route('pay') . "?cancel=true",
            "return_url" => route('confirm') . "?success=true"
        ]
    ];

    $response = $client->execute($request);
    return redirect($response->result->links[1]->href); // Link de "approve"
}
}
