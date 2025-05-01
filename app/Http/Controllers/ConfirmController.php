<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\ShippingMethod;

class ConfirmController extends Controller
{
    public function index()
    {
        return view('confirm');
    }

    public function success(Request $request)
    {
        $user = Auth::user();

        // Obtener carrito y datos de envío
        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
        $shippingAddress = ShippingAddress::find(session('shipping_address_id'));
        $shippingMethod = ShippingMethod::find(session('shipping_method_id'));
        $shippingPrice = session('shipping_price', 0);

        // Calcular totales
        $totalConIVA = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        $subtotal = round($totalConIVA / 1.21, 2);
        $iva = round($totalConIVA - $subtotal, 2);
        $total = round($subtotal + $iva + $shippingPrice, 2);

        // Crear pedido
        $order = Order::create([
            'user_id' => $user->id,
            'shipping_address_id' => $shippingAddress->id,
            'shipping_method_id' => $shippingMethod->id,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'status' => 'confirmado',
        ]);

        // Crear detalles de pedido
        foreach ($cart->items as $item) {
            $order->details()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        // Vaciar carrito
        $cart->items()->delete();
        $cart->delete();

        return view('confirm', compact('order', 'shippingAddress', 'shippingMethod'));
    }
}