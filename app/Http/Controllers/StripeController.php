<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Exception;

class StripeController extends Controller
{
    public function pay(Request $request)
    {
        try {
            // Validar que el monto está presente y es correcto
            $request->validate([
                'amount' => 'required|numeric|min:0.5',
            ]);

            // Establecer clave secreta
            Stripe::setApiKey(config('services.stripe.secret'));

            // Crear la sesión de Stripe Checkout
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Compra en TheJesStore',
                        ],
                        'unit_amount' => intval($request->amount * 100), // en céntimos
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('confirm', [], true) . '?success=true',
                'cancel_url' => route('pay', [], true) . '?cancel=true',
            ]);

            return response()->json(['id' => $session->id]);

        } catch (Exception $e) {
            // Log del error para depuración
            Log::error('Error en StripeController@pay: ' . $e->getMessage());

            // Devolver error al frontend
            return response()->json([
                'error' => 'Error al crear la sesión de pago: ' . $e->getMessage()
            ], 500);
        }
    }
}