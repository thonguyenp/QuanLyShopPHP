<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // --- Smartphones ---
            [
                'name' => 'iPhone 16',
                'slug' => Str::slug('iPhone 16'),
                'category_id' => 1,
                'description' => 'Next-generation iPhone 16 with A18 chip and improved battery life.',
                'gpu' => 'Apple GPU 6-core',
                'cpu' => 'A18 Hexa-core',
                'ram' => '8GB',
                'rom' => '128GB',
                'connection_port' => 'USB-C',
                'camera' => '48MP + 12MP',
                'battery' => '3300mAh',
                'monitor_size' => '6.1 inch',
                'monitor_resolution' => '2556x1179',
                'isArrival' => true,
                'price' => 32990000,
                'stock' => 12,

            ],
            [
                'name' => 'iPhone 16 Pro',
                'slug' => Str::slug('iPhone 16 Pro'),
                'category_id' => 1,
                'description' => 'iPhone 16 Pro with A18 Pro chip, top-tier performance.',
                'gpu' => 'Apple GPU 6-core',
                'cpu' => 'A18 Pro Hexa-core',
                'ram' => '8GB',
                'rom' => '256GB',
                'connection_port' => 'USB-C',
                'camera' => '48MP + 12MP + 12MP',
                'battery' => '3400mAh',
                'monitor_size' => '6.1 inch',
                'monitor_resolution' => '2556x1179',
                'isArrival' => true,
                'price' => 39990000,
                'stock' => 10,
            ],
            [
                'name' => 'iPhone 17',
                'slug' => Str::slug('iPhone 17'),
                'category_id' => 1,
                'description' => 'Future iPhone 17 with A19 chip, ultimate performance and camera system.',
                'gpu' => 'Apple GPU 7-core',
                'cpu' => 'A19 Hexa-core',
                'ram' => '12GB',
                'rom' => '512GB',
                'connection_port' => 'USB-C',
                'camera' => '48MP + 12MP + 12MP + LiDAR',
                'battery' => '3500mAh',
                'monitor_size' => '6.2 inch',
                'monitor_resolution' => '2592x1200',
                'isArrival' => true,
                'price' => 49990000,
                'stock' => 8,

            ]
        ];

        foreach ($products as $product) {
            $product['status'] = $product['stock'] == 0 ? 'out_of_stock' : 'in_stock';
            Product::create($product);
        }
    }
}
