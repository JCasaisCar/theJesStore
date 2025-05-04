<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'adminthejesstore@yopmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin', // ✅ Debe estar aquí
                'email_verified_at' => Carbon::now(),
            ],
            [
                'name' => 'Jesus',
                'email' => 'jesuscasacarrillo@alumnos.ilerna.com',
                'password' => Hash::make('jesus'),
                'role' => 'user', // ✅ Debe estar aquí
                'email_verified_at' => Carbon::now(),

            ],
            [
                'name' => 'Jesus',
                'email' => 'jesuscasacarrillo@gmail.com',
                'password' => Hash::make('jesus'),
                'role' => 'user', // ✅ Debe estar aquí
                'email_verified_at' => Carbon::now(),

            ]
        ]);
    }
}