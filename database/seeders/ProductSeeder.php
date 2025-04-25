<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ModelDevice;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'slug');
        $models = ModelDevice::pluck('id', 'name');

        $products = [
            // Dispositivos
            [
                'category_slug' => 'smartphones',
                'model_name' => 'iPhone 14 Pro Max',
                'name' => 'iPhone 14 Pro Max 256GB',
                'slug' => 'iphone-14-pro-max-256gb',
                'description' => 'El nuevo iPhone 14 Pro Max con pantalla Super Retina XDR y cámara de 48MP.',
                'price' => 1399.00,
                'sku' => 'IPH14PM256',
                'image' => 'iphone_14_pro_max.jpg',
                'stock' => 30,
            ],
            [
                'category_slug' => 'tablets',
                'model_name' => 'iPad Pro M2',
                'name' => 'iPad Pro M2 11" 256GB',
                'slug' => 'ipad-pro-m2-11-256gb',
                'description' => 'iPad Pro M2 con chip M2, pantalla Liquid Retina y Apple Pencil 2.',
                'price' => 1199.00,
                'sku' => 'IPADM2-11-256',
                'image' => 'ipad_pro_m2.jpg',
                'stock' => 25,
            ],
            [
                'category_slug' => 'smartphones',
                'model_name' => 'Galaxy S23 Ultra',
                'name' => 'Samsung Galaxy S23 Ultra 512GB',
                'slug' => 'samsung-galaxy-s23-ultra-512gb',
                'description' => 'Galaxy S23 Ultra con S Pen integrado y cámara de 200MP.',
                'price' => 1499.00,
                'sku' => 'SGS23U-512',
                'image' => 'galaxy_s23_ultra.jpg',
                'stock' => 20,
            ],
            [
                'category_slug' => 'tablets',
                'model_name' => 'Galaxy Tab S8+',
                'name' => 'Samsung Galaxy Tab S8+ 256GB',
                'slug' => 'samsung-galaxy-tab-s8-plus-256gb',
                'description' => 'Galaxy Tab S8+ de 12.4" AMOLED con S Pen incluido.',
                'price' => 999.00,
                'sku' => 'SGTABS8PLUS-256',
                'image' => 'galaxy_tab_s8_plus.jpg',
                'stock' => 18,
            ],
            [
                'category_slug' => 'smartphones',
                'model_name' => 'Xiaomi 13 Pro',
                'name' => 'Xiaomi 13 Pro 256GB',
                'slug' => 'xiaomi-13-pro-256gb',
                'description' => 'Xiaomi 13 Pro con cámara Leica de 1 pulgada y Snapdragon 8 Gen 2.',
                'price' => 899.00,
                'sku' => 'XIA13PRO-256',
                'image' => 'xiaomi_13_pro.png',
                'stock' => 22,
            ],
            [
                'category_slug' => 'smartphones',
                'model_name' => 'Huawei P60 Pro',
                'name' => 'Huawei P60 Pro 512GB',
                'slug' => 'huawei-p60-pro-512gb',
                'description' => 'Huawei P60 Pro con cámara XMAGE Ultra Lighting y diseño premium.',
                'price' => 1099.00,
                'sku' => 'HWP60PRO-512',
                'image' => 'huawei_p60_pro.jpg',
                'stock' => 15,
            ],

            // Accesorios
            [
                'category_slug' => 'accesorios',
                'model_name' => 'iPhone 14 Pro Max',
                'name' => 'Funda MagSafe Transparente iPhone 14 Pro Max',
                'slug' => 'funda-magsafe-iphone-14-pro-max',
                'description' => 'Funda original MagSafe para iPhone 14 Pro Max de Apple.',
                'price' => 69.00,
                'sku' => 'FUNDA-IPH14PM',
                'image' => 'funda_magsafe_transparente_iphone_14_pro_max.jpeg',
                'stock' => 50,
            ],
            [
                'category_slug' => 'accesorios',
                'model_name' => 'Galaxy S23 Ultra',
                'name' => 'Protector de Pantalla Galaxy S23 Ultra',
                'slug' => 'protector-pantalla-galaxy-s23-ultra',
                'description' => 'Protector de vidrio templado para Samsung Galaxy S23 Ultra.',
                'price' => 29.00,
                'sku' => 'PROT-SGS23U',
                'image' => 'protector_de_pantalla_galaxy_s23_ltra.webp',
                'stock' => 60,
            ],
            [
                'category_slug' => 'accesorios',
                'model_name' => 'Galaxy Tab S8+',
                'name' => 'Funda Teclado Samsung Galaxy Tab S8+',
                'slug' => 'funda-teclado-galaxy-tab-s8-plus',
                'description' => 'Funda con teclado Bluetooth para Galaxy Tab S8+.',
                'price' => 149.00,
                'sku' => 'FTECLADO-GTABS8P',
                'image' => 'funda_teclado_samsung_galaxy_tab_s8_plus.webp',
                'stock' => 12,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $categories[$product['category_slug']],
                'model_id' => $models[$product['model_name']],
                'name' => $product['name'],
                'slug' => $product['slug'],
                'description' => $product['description'],
                'price' => $product['price'],
                'sku' => $product['sku'],
                'image' => $product['image'],
                'stock' => $product['stock'],
            ]);
        }
    }
}