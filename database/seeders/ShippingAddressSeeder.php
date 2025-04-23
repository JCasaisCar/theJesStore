<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShippingAddress;

class ShippingAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            ShippingAddress::create([
                'user_id' => 1,
                'nombre' => "Nombre $i",
                'apellidos' => "Apellido $i",
                'email' => "user$i@example.com",
                'telefono' => "60012345$i",
                'direccion' => "Calle Ejemplo $i",
                'direccion2' => "Piso $i",
                'ciudad' => "Ciudad $i",
                'provincia' => "Provincia $i",
                'codigo_postal' => "4100$i",
                'pais' => "España",
            ]);
        }
    }
}
