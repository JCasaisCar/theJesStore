<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingAddress;
use App\Models\ShippingMethod;
use App\Models\DiscountCode;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderConfirmedNotification;

class ConfirmController extends Controller
{
    public function success(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->query('method', 'desconocido');

        $cart = Cart::with('items.product')->where('user_id', $user->id)->first();
        $shippingAddress = ShippingAddress::find(session('shipping_address_id'));
        $shippingMethod = ShippingMethod::find(session('shipping_method_id'));
        $shippingPrice = session('shipping_price', 0);

        $totalConIVA = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
        $subtotal = round($totalConIVA / 1.21, 2);
        $iva = round($totalConIVA - $subtotal, 2);

        $discountAmount = 0;
        $discountCode = null;

        if (session()->has('cupon_codigo')) {
            $code = session('cupon_codigo');
            $cupon = DiscountCode::where('code', $code)->first();

            if ($cupon && $cupon->is_active) {
                $discountAmount = round($totalConIVA * ($cupon->percentage / 100), 2);
                $discountCode = $cupon;

                $cupon->users()->updateExistingPivot($user->id, ['used' => true]);
                session()->forget('cupon_codigo');
            }
        }

        $total = round($totalConIVA - $discountAmount + $shippingPrice, 2);

        $order = Order::create([
            'user_id' => $user->id,
            'shipping_address_id' => $shippingAddress->id,
            'shipping_method_id' => $shippingMethod->id,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'status' => 'confirmado',
            'payment_method' => $paymentMethod,
            'discount_code_id' => $discountCode?->id,
        ]);

        foreach ($cart->items as $item) {
            $product = $item->product;
            if ($product->stock < $item->quantity) {
                return redirect()->back()->with('error', 'No hay suficiente stock para algunos productos.');
            }

            $order->details()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);

            $product->stock -= $item->quantity;
            $product->save();
        }

        $pdf = PDF::loadView('invoices.invoice', [
            'order' => $order,
            'shippingAddress' => $shippingAddress,
            'shippingMethod' => $shippingMethod,
            'shippingPrice' => $shippingPrice,
        ]);

        Storage::disk('public')->makeDirectory('facturas');
        Storage::disk('public')->put("facturas/factura_pedido_{$order->id}.pdf", $pdf->output());

        // Enviar notificación al usuario con detalles del pedido y link a la factura
        $invoiceUrl = asset("storage/facturas/factura_pedido_{$order->id}.pdf");
        $user->notify(new OrderConfirmedNotification($order->load('details.product'), $invoiceUrl));

        $cart->items()->delete();
        $cart->delete();

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
