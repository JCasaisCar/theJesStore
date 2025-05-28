<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ShippingMethod;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\DiscountCode;

class CartController extends Controller
{
    public function index(Request $request)
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    $items = $cart->items()->with('product')->get();

    $totalConIVA = $items->sum(fn($item) => $item->product->price * $item->quantity);
    $subtotalSinIVA = round($totalConIVA / 1.21, 2);
    $iva = round($totalConIVA - $subtotalSinIVA, 2);

    $envioMetodo = ShippingMethod::orderBy('precio')->first();
    $envio = $envioMetodo ? $envioMetodo->precio : 0;

    $descuento = 0;
    $codigo = session('cupon_codigo');
    if ($codigo) {
        $cupon = DiscountCode::where('code', $codigo)
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereDoesntHave('users')
                      ->orWhereHas('users', fn($q) => $q->where('users.id', Auth::id()));
            })
            ->whereDoesntHave('orders', fn($q) => $q->where('user_id', Auth::id()))
            ->first();

        if ($cupon) {
            $descuento = round($totalConIVA * $cupon->percentage / 100, 2);
        } else {
            session()->forget('cupon_codigo');
        }
    }

    $totalFinal = round($totalConIVA + $envio - $descuento, 2);

    return view('cart', compact('items', 'subtotalSinIVA', 'iva', 'envio', 'totalFinal', 'descuento', 'codigo'));
}

public function applyCoupon(Request $request)
{
    $codigo = $request->input('coupon');

    $cupon = DiscountCode::where('code', $codigo)
        ->where('is_active', true)
        ->where(function ($query) {
            $query->whereDoesntHave('users')
                  ->orWhereHas('users', function ($q) {
                      $q->where('users.id', Auth::id())
                        ->where('discount_code_user.used', false);
                  });
        })
        ->first();

    if ($cupon) {
        session(['cupon_codigo' => $codigo]);
        return redirect()->route('cart')->with('success', __('cart.cupon_aplicado'));

    }

return redirect()->route('cart')->with('error', __('cart.cupon_invalido'));
}

    public function add(Request $request)
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);

    $product = Product::findOrFail($productId);

    $cartItem = $cart->items()->where('product_id', $productId)->first();
    $currentQuantityInCart = $cartItem ? $cartItem->quantity : 0;
    $availableStock = $product->stock; 

    if ($currentQuantityInCart + $quantity > $availableStock) {
return redirect()->back()->with('error', __('cart.stock_limitado'));
    }

    if ($cartItem) {
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        $cart->items()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
        ]);
    }

return redirect()->back()->with('success', __('cart.producto_anadido'));
}


public function update(Request $request, $id)
{
    $user = Auth::user();
    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $item = $cart->items()->where('id', $id)->first();

    if (!$item) {
return redirect()->route('cart')->with('error', __('cart.item_no_encontrado'));
    }

    $action = $request->input('action');
    $product = $item->product; 

    $availableStock = $product->stock; 

    if ($action === 'increase') {
        if ($item->quantity + 1 > $availableStock) {
            return redirect()->route('cart')->with('error', __('cart.stock_limitado_cantidad'));

        }
        $item->quantity++;
    } 
    elseif ($action === 'decrease' && $item->quantity > 1) {
        $item->quantity--;
    }

    $item->save();

return redirect()->route('cart')->with('success', __('cart.cantidad_actualizada'));
}


    public function remove($id)
    {
        $item = CartItem::findOrFail($id);
        $item->delete();

return redirect()->route('cart')->with('success', __('cart.producto_eliminado'));
    }

    public function clear()
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->first();

        if ($cart) {
            $cart->items()->delete();
        }

return redirect()->route('cart')->with('success', __('cart.carrito_vaciado'));    
}
}
