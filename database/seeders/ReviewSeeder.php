<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Review::create([
                'user_id' => 1,
                'product_id' => rand(1, 20),
                'rating' => rand(1, 5),
                'comment' => "Comentario de prueba número $i",
            ]);
        }
    }
}
