<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ModelDevice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Brand;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::with('category')->get();
    $categories = Category::all(); // <-- categorías desde la DB
    $models = ModelDevice::all();
    $brands = Brand::all();
    
    return view('admin.productos.index', compact('products', 'categories', 'models', 'brands'));
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
        try {
            $validated = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'nullable|image|max:2048',
                'stock' => 'required|integer|min:0',
                'status' => 'required|boolean',
                'brand_id' => 'nullable|exists:brands,id',
                'model_id' => 'nullable|exists:model_devices,id',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors()); // Muestra los errores en detalle
        }
    
        // Crear marca si se proporciona una nueva marca
        if ($request->filled('new_brand')) {
            $brand = Brand::create([
                'name' => $request->new_brand,
                'slug' => Str::slug($request->new_brand),
            ]);
            $brand_id = $brand->id;
        } else {
            $brand_id = $request->brand_id;
        }
    
        // Crear modelo si se proporciona un nuevo modelo
        if ($request->filled('new_model')) {
            $model = ModelDevice::create([
                'name' => $request->new_model,
                'brand_id' => $brand_id,
            ]);
            $model_id = $model->id;
        } else {
            $model_id = $request->model_id;
        }
    
        // Manejar la carga de la imagen
        $imageName = null;
        if ($request->hasFile('image')) {
            // Obtener el nombre de la imagen
            $imageName = $request->file('image')->getClientOriginalName();
    
            // Intentar guardarla en 'public/storage/products'
            $request->file('image')->storeAs('products', $imageName, 'public');
            
            // Si no se puede guardar en 'public/storage/products', guardar en 'public/img/products'
            if (!file_exists(public_path('storage/products/' . $imageName))) {
                $request->file('image')->storeAs('img/products', $imageName, 'public');
            }
        }
    
        // Generar SKU automático (ej: "PRD-20240512-XYZ123")
        $sku = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
    
        // Asegurar que sea único (opcional, aunque por validación de DB debería bastar)
        while (Product::where('sku', $sku)->exists()) {
            $sku = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        }
    
        // Crear el producto
        $product = Product::create([
            'category_id' => $request->category_id,
            'model_id' => $model_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $sku,
            'image' => $imageName,  // Solo se guarda el nombre de la imagen
            'stock' => $request->stock,
            'active' => $request->status,
        ]);
    
        return redirect()->route('admin.productos')->with('success', 'Producto creado correctamente.');
    }
    







public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validar los datos básicos
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|boolean',
        'image' => 'nullable|image',
        'stock' => 'nullable|integer|min:0',
    ]);

    // Crear marca si se proporcionó
    if ($request->filled('new_brand')) {
        $brand = Brand::create([
            'name' => $request->new_brand,
            'slug' => Str::slug($request->new_brand)
        ]);
        $brand_id = $brand->id;
    } else {
        $brand_id = $request->brand_id;
    }

    // Crear modelo si se proporcionó
    if ($request->filled('new_model')) {
        $model = ModelDevice::create([
            'name' => $request->new_model,
            'brand_id' => $brand_id
        ]);
        $model_id = $model->id;
    } else {
        $model_id = $request->model_id;
    }

    // Asignar valores actualizados
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category_id = $request->category_id;
    $product->model_id = $model_id;
    $product->active = $request->status;

    if ($request->filled('stock')) {
        $product->stock = $request->stock;
    }

    // Si hay una nueva imagen
    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->image = $request->file('image')->store('products', 'public');
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
        'stock' => 'required|integer|min:0',
    ]);

    $producto->update([
        'stock' => $request->stock
    ]);

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



public function edit(Product $producto)
{
    if (!$producto) {
        return response()->json(['error' => 'Producto no encontrado'], 404);
    }

    $producto->load(['category', 'modelDevice.brand']); // Cargar relaciones

    return response()->json([
        'id' => $producto->id,
        'name' => $producto->name,
        'description' => $producto->description,
        'price' => $producto->price,
        'sku' => $producto->sku,
        'image' => $producto->image,
        'stock' => $producto->stock,
        'status' => $producto->active,
        'category_id' => $producto->category_id,
        'model_id' => $producto->model_id,
        'brand_id' => $producto->modelDevice->brand_id ?? null,
        'model_name' => $producto->modelDevice->name ?? null,
        'brand_name' => $producto->modelDevice->brand->name ?? null,
    ]);
}
}
