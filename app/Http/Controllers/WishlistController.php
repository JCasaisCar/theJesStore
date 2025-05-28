<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->with('product')->get();
        return view('wishlist', compact('wishlist'));
    }

    public function add(Product $product)
    {
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
            ]);
        }

    return redirect()->back()->with('success', __('wishlist.agregado'));
    }



    public function remove(Product $product)
{
    Wishlist::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->delete();

    return redirect()->back()->with('success', __('wishlist.eliminado'));
}
}