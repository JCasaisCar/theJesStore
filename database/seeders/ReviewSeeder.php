<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Product;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = User::pluck('id')->toArray();      // ✅ IDs de usuarios reales
        $productIds = Product::pluck('id')->toArray(); // ✅ IDs de productos reales

        for ($i = 1; $i <= 15; $i++) {
            Review::create([
                'user_id' => fake()->randomElement($userIds),
                'product_id' => fake()->randomElement($productIds),
                'rating' => rand(1, 5),
                'comment' => fake()->sentence(),
            ]);
        }
    }
}