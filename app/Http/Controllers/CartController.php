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

    // Aplicar cupón si existe
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
            $query->whereDoesntHave('users') // cupón global
                  ->orWhereHas('users', function ($q) {
                      $q->where('users.id', Auth::id())
                        ->where('discount_code_user.used', false); // <-- esta línea es la clave
                  });
        })
        ->first();

    if ($cupon) {
        session(['cupon_codigo' => $codigo]);
        return redirect()->route('cart')->with('success', 'Cupón aplicado correctamente.');
    }

    return redirect()->route('cart')->with('error', 'Cupón inválido o ya utilizado.');
}

    public function add(Request $request)
{
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity', 1);

    // Obtener el producto desde la base de datos
    $product = Product::findOrFail($productId);

    // Verificar que la cantidad solicitada no supere el stock disponible
    $cartItem = $cart->items()->where('product_id', $productId)->first();
    $currentQuantityInCart = $cartItem ? $cartItem->quantity : 0;
    $availableStock = $product->stock; // Suponiendo que el campo stock está en el modelo Product

    // Verificar si el carrito ya tiene ese producto y la cantidad total no supere el stock
    if ($currentQuantityInCart + $quantity > $availableStock) {
        return redirect()->back()->with('error', 'No puedes añadir más productos al carrito. El stock disponible es limitado.');
    }

    if ($cartItem) {
        // Si ya hay ese producto, aumentar la cantidad
        $cartItem->quantity += $quantity;
        $cartItem->save();
    } else {
        // Si no existe en el carrito, agregarlo
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
    $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    $item = $cart->items()->where('id', $id)->first();

    if (!$item) {
        return redirect()->route('cart')->with('error', 'Item no encontrado en tu carrito.');
    }

    $action = $request->input('action');
    $product = $item->product; // Obtener el producto relacionado con el item del carrito

    // Obtener el stock disponible del producto
    $availableStock = $product->stock; 

    // Si la acción es 'increase', verificar que no se supere el stock
    if ($action === 'increase') {
        // Verificar que la cantidad total no supere el stock disponible
        if ($item->quantity + 1 > $availableStock) {
            return redirect()->route('cart')->with('error', 'No puedes aumentar la cantidad del producto. El stock disponible es limitado.');
        }
        $item->quantity++;
    } 
    // Si la acción es 'decrease', verificar que la cantidad no se vuelva negativa
    elseif ($action === 'decrease' && $item->quantity > 1) {
        $item->quantity--;
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
            $cart->items()->delete();
        }

        return redirect()->route('cart')->with('success', 'Carrito vaciado correctamente.');
    }
}
