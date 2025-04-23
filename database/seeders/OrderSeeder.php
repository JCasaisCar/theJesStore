<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Order::create([
                'user_id' => 1,
                'shipping_address_id' => $i,
                'total' => rand(50, 300),
                'status' => 'pendiente',
                'payment_method' => 'tarjeta',
            ]);
        }
    }
}
