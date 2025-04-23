<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,               // Asumiendo que este seed crea usuarios con roles
            CategorySeeder::class,
            ProductSeeder::class,
            ShippingAddressSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            WishlistSeeder::class,
            CartItemSeeder::class,
            ReviewSeeder::class,
            ContactSeeder::class,
        ]);
    }
}