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
    public function success(Request $request)
{
    $user = Auth::user();
    $paymentMethod = $request->query('method', 'desconocido');

    // Obtener el carrito y datos de envío
    $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
    $shippingAddress = ShippingAddress::find(session('shipping_address_id'));
    $shippingMethod = ShippingMethod::find(session('shipping_method_id'));
    $shippingPrice = session('shipping_price', 0);

    // Total con IVA solo de productos
    $totalConIVA = $cart->items->sum(fn($item) => floatval($item->product->price) * $item->quantity);

    // Subtotal e IVA solo sobre productos
    $subtotal = round($totalConIVA / 1.21, 2);
    $iva = round($totalConIVA - $subtotal, 2);

    // Total final: productos (con IVA) + envío (sin IVA)
    $total = round($totalConIVA + $shippingPrice, 2);

    // Crear pedido
    $order = Order::create([
        'user_id' => $user->id,
        'shipping_address_id' => $shippingAddress->id,
        'shipping_method_id' => $shippingMethod->id,
        'subtotal' => $subtotal,
        'iva' => $iva,
        'total' => $total,
        'status' => 'confirmado',
        'payment_method' => $paymentMethod,
    ]);

    // Crear detalles del pedido y actualizar stock
    foreach ($cart->items as $item) {
        // Verificar que haya suficiente stock antes de proceder
        $product = $item->product;
        if ($product->stock < $item->quantity) {
            return redirect()->back()->with('error', 'No hay suficiente stock para algunos productos.');
        }

        // Crear detalles del pedido
        $order->details()->create([
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);

        // Reducir el stock del producto
        $product->stock -= $item->quantity;
        $product->save();
    }

    // Vaciar carrito
    $cart->items()->delete();
    $cart->delete();

    // Guardar el ID del pedido en sesión y redirigir a vista limpia
    session()->forget(['shipping_address_id', 'shipping_method_id', 'shipping_price']);
    session()->put('order_id', $order->id);

    return redirect()->route('confirm');
}


    public function index()
    {
        $orderId = session('order_id');

        if (!$orderId) {
            return redirect('/')->with('error', 'No se encontró ningún pedido.');
        }

        $order = Order::with('details.product', 'shippingAddress.shippingMethod')->find($orderId);

        if (!$order) {
            return redirect('/')->with('error', 'Pedido no encontrado.');
        }

        return view('confirm', [
            'order' => $order,
            'shippingAddress' => $order->shippingAddress,
            'shippingMethod' => $order->shippingAddress->shippingMethod,
        ]);
    }
}