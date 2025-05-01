<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,           
            CategorySeeder::class,        
            BrandSeeder::class,            
            ModelDeviceSeeder::class,    
            ProductSeeder::class,          
            ShippingAddressSeeder::class,  
            OrderSeeder::class,           
            OrderItemSeeder::class,       
            WishlistSeeder::class,         
            CartItemSeeder::class,          
            ReviewSeeder::class,            
            ContactSeeder::class, 
            ShippingMethodSeeder::class,          
        ]);
    }
}