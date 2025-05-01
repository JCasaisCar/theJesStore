<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShippingMethodSeeder extends Seeder
{
    public function run()
    {
        DB::table('shipping_methods')->insert([
            [
                'nombre' => 'Envío estándar',
                'descripcion' => 'Entrega en 3-5 días laborales',
                'precio' => 4.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nombre' => 'Envío express',
                'descripcion' => 'Entrega en 24-48 horas',
                'precio' => 9.99,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}