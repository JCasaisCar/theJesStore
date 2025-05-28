<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\ShippingAddress;
use App\Models\ShippingMethod;
use App\Models\DiscountCode;

class PayController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $cart = Cart::with('items.product')->where('user_id', $user->id)->first();

    $shippingAddress = ShippingAddress::find(session('shipping_address_id'));
    $shippingMethod = ShippingMethod::find(session('shipping_method_id'));
    $shippingPrice = session('shipping_price', 0);

    $totalConIVA = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);
    $subtotal = round($totalConIVA / 1.21, 2);
    $iva = round($totalConIVA - $subtotal, 2);

    $codigo = session('cupon_codigo');
    $cupon = DiscountCode::where('code', $codigo)->first();
    $descuento = $cupon ? round($totalConIVA * $cupon->percentage / 100, 2) : 0;

    $total = round($totalConIVA + $shippingPrice - $descuento, 2);

    return view('pay', compact(
        'cart',
        'shippingAddress',
        'shippingMethod',
        'shippingPrice',
        'subtotal',
        'iva',
        'total',
        'descuento',
        'codigo'
    ));
}
}