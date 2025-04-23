<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandIds = Brand::pluck('id')->toArray(); // Obtiene todos los IDs de marcas

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'category_id' => rand(1, 3),
                'brand_id' => fake()->randomElement($brandIds), // Asocia una marca aleatoria
                'name' => "Producto $i",
                'slug' => "producto-$i",
                'description' => "Descripción del producto $i.",
                'price' => rand(10, 300),
                'sku' => "SKU$i",
                'image' => null,
                'stock' => rand(5, 100),
            ]);
        }
    }
}