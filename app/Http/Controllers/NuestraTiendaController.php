<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ModelDevice;

class NuestraTiendaController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with(['category', 'model.brand'])->where('active', true);

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    if ($request->filled('brand')) {
        $query->whereHas('model.brand', function ($q) use ($request) {
            $q->where('slug', $request->brand);
        });
    }

    if ($request->filled('price')) {
        $query->orderBy('price', $request->price);
    }

    $products = $query->paginate(8);

    $categories = Category::all();
    $brands = Brand::all();

    return view('nuestra_tienda', compact('products', 'categories', 'brands'));
}
}