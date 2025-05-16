<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ShippingAddress;
use App\Models\ShippingMethod;

class AddresController extends Controller
{
    public function index()
{
    $user = Auth::user();
    $cart = \App\Models\Cart::with('items.product')->where('user_id', $user->id)->first();

    $totalConIVA = $cart->items->sum(fn($item) => $item->product->price * $item->quantity);

    $subtotal = round($totalConIVA / 1.21, 2);
    $iva = round($totalConIVA - $subtotal, 2);

    $shippingMethods = ShippingMethod::orderBy('precio')->get();
    $envio = optional($shippingMethods->first())->precio ?? 0;

    // Lógica del cupón
    $codigo = session('cupon_codigo');
    $cupon = \App\Models\DiscountCode::where('code', $codigo)->first();
    $descuento = $cupon ? round($totalConIVA * $cupon->percentage / 100, 2) : 0;

    $total = round($totalConIVA + $envio - $descuento, 2);

    return view('addres', compact('cart', 'subtotal', 'iva', 'envio', 'total', 'shippingMethods', 'descuento', 'codigo'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',
            'direccion' => 'required|string',
            'ciudad' => 'required|string',
            'provincia' => 'required|string',
            'codigo_postal' => 'required|string',
            'pais' => 'required|string',
            'shipping_method_id' => 'required|exists:shipping_methods,id',
        ]);

        $user = Auth::user();

        $shipping = $user->shippingAddresses()->create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'direccion2' => $request->direccion2,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'codigo_postal' => $request->codigo_postal,
            'pais' => $request->pais,
            'shipping_method_id' => $request->shipping_method_id,
        ]);

        $shippingMethod = ShippingMethod::find($request->shipping_method_id);

        session([
            'shipping_address_id' => $shipping->id,
            'shipping_method_id' => $shippingMethod->id,
            'shipping_price' => $shippingMethod->precio,
        ]);

        return redirect()->route('pay')->with('success', 'Dirección guardada correctamente.');
    }
}