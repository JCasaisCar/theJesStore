<?php

namespace App\Http\Controllers;

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
        // Mostrar todos los productos
        $products = Product::all();
        return view('admin.productos.index', compact('products'));
    }

    public function getProducts()
    {
        $products = Product::with(['category', 'modelDevice'])->get();
        return response()->json($products);
    }

    public function create()
    {
        // Crear un nuevo producto
        $categories = Category::all();
        $models = ModelDevice::all();
        return view('admin.productos.create', compact('categories', 'models'));
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

        Product::create([
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
    if (!$producto) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    return response()->json($producto);  // Si todo está bien, devolvemos el producto
}





public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category;
    $product->active = $request->status;

    // Si hay una nueva imagen
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    $product->save();

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

    public function updateStock(Request $request, Product $producto)
{
    $request->validate([
        'stock' => 'required|integer|min:0',  // Aseguramos que el stock no sea negativo
    ]);

    // Asignar el nuevo valor de stock
    $producto->stock = $request->stock;
    
    // Guardar en la base de datos
    $producto->save();

    // Redireccionar a la lista de productos con mensaje de éxito
    return redirect()->route('admin.productos')->with('success', 'Stock actualizado correctamente.');
}


    public function toggleStatus(Product $product)
{
    // Cambiar el estado del producto
    $product->active = !$product->active;
    $product->save();

    // Redirigir de vuelta con un mensaje
    return redirect()->route('admin.productos')->with('status', 'Estado del producto actualizado correctamente.');
}
}
