<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            OrderItem::create([
                'order_id' => rand(1, 5),
                'product_id' => rand(1, 20),
                'quantity' => rand(1, 3),
                'price' => rand(10, 100),
            ]);
        }
    }
}
