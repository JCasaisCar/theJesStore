<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModelDevice;

class ModelDeviceSeeder extends Seeder
{
    public function run(): void
    {
        ModelDevice::insert([
            ['brand_id' => 1, 'name' => 'iPhone 14 Pro Max'],
            ['brand_id' => 1, 'name' => 'iPad Pro M2'],
            ['brand_id' => 2, 'name' => 'Galaxy S23 Ultra'],
            ['brand_id' => 2, 'name' => 'Galaxy Tab S8+'],
            ['brand_id' => 3, 'name' => 'Xiaomi 13 Pro'],
            ['brand_id' => 4, 'name' => 'Huawei P60 Pro'],
        ]);
    }
}
