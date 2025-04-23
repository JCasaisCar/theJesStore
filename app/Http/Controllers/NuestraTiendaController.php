<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class NuestraTiendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand']);

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

        // Filtro por marca
        if ($request->filled('brand')) {
            $query->whereHas('brand', function ($q) use ($request) {
                $q->where('slug', $request->brand);
            });
        }

        // Filtro por precio
        if ($request->filled('price')) {
            $query->orderBy('price', $request->price);
        }

        $products = $query->paginate(12);

        // Se cargan todas las categorías y marcas para los filtros
        $categories = Category::all();
        $brands = Brand::all();

        return view('nuestra_tienda', compact('products', 'categories', 'brands'));
    }
}