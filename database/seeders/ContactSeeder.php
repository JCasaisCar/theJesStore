<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;


class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Contact::create([
                'nombre' => "Usuario $i",
                'email' => "contacto$i@thejesstore.com",
                'telefono' => "60000000$i",
                'asunto' => "Consulta $i",
                'mensaje' => "Este es un mensaje de prueba número $i.",
            ]);
        }
    }
}
