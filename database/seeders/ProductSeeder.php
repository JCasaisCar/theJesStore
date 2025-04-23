<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'category_id' => rand(1, 3),
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
