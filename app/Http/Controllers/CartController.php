<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
$items = $cart->items()->with('product')->get();

// Cálculos
$totalConIVA = 0;

foreach ($items as $item) {
    $totalConIVA += $item->product->price * $item->quantity;
}

// Calcular subtotal sin IVA y el IVA (21%)
$subtotalSinIVA = round($totalConIVA * 100 / 121, 2);
$iva = round($totalConIVA - $subtotalSinIVA, 2);
$envio = 4.99;
$totalFinal = round($totalConIVA + $envio, 2);

return view('cart', compact('items', 'subtotalSinIVA', 'iva', 'envio', 'totalFinal'));
}

public function add(Request $request)
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);

    $item = $cart->items()->where('product_id', $productId)->first();

    if ($item) {
        $item->quantity += $quantity;
        $item->save();
    } else {
        $cart->items()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

    return redirect()->back()->with('success', 'Producto añadido al carrito.');
}

public function update(Request $request, $id)
{

    $user = Auth::user();

    // Verificamos o creamos el carrito
    $cart = Cart::firstOrCreate(['user_id' => $user->id]);

    // Buscamos el item dentro del carrito
    $item = $cart->items()->where('id', $id)->first();

    
    if (!$item) {
        return redirect()->route('cart')->with('error', 'Item no encontrado en tu carrito.');
    }

    // Acción recibida del formulario
    $action = $request->input('action');

    // Aplicar cambio
    if ($action === 'increase') {
        $item->quantity++;
    } elseif ($action === 'decrease' && $item->quantity > 1) {
        $item->quantity--;
    } else {
    }

    $item->save();

    return redirect()->route('cart')->with('success', 'Cantidad actualizada.');
}

public function remove($id)
{
    $item = CartItem::findOrFail($id);
    $item->delete();

    return redirect()->route('cart')->with('success', 'Producto eliminado del carrito.');
}


public function clear()
{
    $user = Auth::user();
    $cart = Cart::where('user_id', $user->id)->first();

    if ($cart) {
        $cart->items()->delete(); // elimina todos los items relacionados
    }

    return redirect()->route('cart')->with('success', 'Carrito vaciado correctamente.');
}
}