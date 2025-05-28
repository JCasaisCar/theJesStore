<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ModelDevice;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        $categories = Category::all();
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
            dd($e->errors());
        }

        if ($request->filled('new_brand')) {
            $brand = Brand::create([
                'name' => $request->new_brand,
                'slug' => Str::slug($request->new_brand),
            ]);
            $brand_id = $brand->id;
        } else {
            $brand_id = $request->brand_id;
        }

        if ($request->filled('new_model')) {
            $model = ModelDevice::create([
                'name' => $request->new_model,
                'brand_id' => $brand_id,
            ]);
            $model_id = $model->id;
        } else {
            $model_id = $request->model_id;
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('products', $imageName, 'public');
        }

        $sku = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        while (Product::where('sku', $sku)->exists()) {
            $sku = 'PRD-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
        }

        Product::create([
            'category_id' => $request->category_id,
            'model_id' => $model_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'sku' => $sku,
            'image' => $imageName,
            'stock' => $request->stock,
            'active' => $request->status,
        ]);

        return redirect()->route('admin.productos')->with('success', __('producto_creado'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|boolean',
            'image' => 'nullable|image',
            'stock' => 'nullable|integer|min:0',
        ]);

        if ($request->filled('new_brand')) {
            $brand = Brand::create([
                'name' => $request->new_brand,
                'slug' => Str::slug($request->new_brand)
            ]);
            $brand_id = $brand->id;
        } else {
            $brand_id = $request->brand_id;
        }

        if ($request->filled('new_model')) {
            $model = ModelDevice::create([
                'name' => $request->new_model,
                'brand_id' => $brand_id
            ]);
            $model_id = $model->id;
        } else {
            $model_id = $request->model_id;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->model_id = $model_id;
        $product->active = $request->status;

        if ($request->filled('stock')) {
            $product->stock = $request->stock;
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $filename = $request->file('image')->hashName(); // o originalName si prefieres el nombre original
            $request->file('image')->storeAs('products', $filename, 'public');
            $product->image = $filename;
        }

        $product->save();

        return redirect()->route('admin.productos')->with('success', __('producto_actualizado'));
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
        return response()->json(Category::all());
    }

    public function getModels()
    {
        return response()->json(ModelDevice::all());
    }

    public function updateStock(Request $request, Product $producto)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $producto->update([
            'stock' => $request->stock
        ]);

        return redirect()->route('admin.productos')->with('success', __('stock_actualizado'));
    }

    public function toggleStatus(Product $product)
    {
        $product->active = !$product->active;
        $product->save();

        return redirect()->route('admin.productos')->with('success', __('estado_producto_actualizado'));
    }

    public function edit(Product $producto)
    {
        if (!$producto) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $producto->load(['category', 'modelDevice.brand']);

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
