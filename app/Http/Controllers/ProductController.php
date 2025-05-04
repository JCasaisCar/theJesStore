<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ModelDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.productos.index');
    }

    public function getProducts()
    {
        $products = Product::with(['category', 'modelDevice'])->get();
        return response()->json($products);
    }

    public function create()
    {
        return view('admin.productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'model_id' => 'nullable|exists:model_devices,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:products,sku',
            'image' => 'nullable|image',
            'stock' => 'required|integer',
        ]);

        $imagePath = $request->file('image')?->store('products', 'public');

        $product = Product::create([
            'category_id' => $request->category_id,
            'model_id' => $request->model_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $request->sku,
            'image' => $imagePath,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
    }

    public function show(Product $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    public function edit(Product $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    public function update(Request $request, Product $producto)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'model_id' => 'nullable|exists:model_devices,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'sku' => 'required|string|unique:products,sku,' . $producto->id,
            'image' => 'nullable|image',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            if ($producto->image) {
                Storage::disk('public')->delete($producto->image);
            }
            $producto->image = $request->file('image')->store('products', 'public');
        }

        $producto->update([
            'category_id' => $request->category_id,
            'model_id' => $request->model_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $request->sku,
            'stock' => $request->stock,
        ]);

        return redirect()->route('admin.productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $producto)
    {
        if ($producto->image) {
            Storage::disk('public')->delete($producto->image);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado.']);
    }

    public function updateStatus(Product $producto)
    {
        $producto->active = !$producto->active;
        $producto->save();

        return response()->json(['message' => 'Estado actualizado.', 'status' => $producto->active]);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getModels()
    {
        $models = ModelDevice::all();
        return response()->json($models);
    }
}
