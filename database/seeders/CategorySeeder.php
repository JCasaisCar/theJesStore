<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ['name' => 'Smartphones', 'slug' => 'smartphones', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accesorios', 'slug' => 'accesorios', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tablets', 'slug' => 'tablets', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
