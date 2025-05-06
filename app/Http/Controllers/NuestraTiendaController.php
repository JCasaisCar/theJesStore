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

    // Búsqueda
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // Filtro por categoría
    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category);
        });
    }

    // Filtro por marca (a través de model_device)
    if ($request->filled('brand')) {
        $query->whereHas('model.brand', function ($q) use ($request) {
            $q->where('slug', $request->brand);
        });
    }

    // Filtro por precio
    if ($request->filled('price')) {
        $query->orderBy('price', $request->price);
    }

    $products = $query->paginate(12);

    // Cargar opciones para filtros
    $categories = \App\Models\Category::all();
    $brands = \App\Models\Brand::all();

    return view('nuestra_tienda', compact('products', 'categories', 'brands'));
}
}