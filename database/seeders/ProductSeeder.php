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
            [
                'name' => 'iPhone 15 Pro Max',
                'slug' => Str::slug('iPhone 15 Pro Max'),
                'category_id' => 1,
                'description' => 'Smartphone cao cấp của Apple với chip A17 Pro, khung titan và camera 48MP.',
                'price' => 34990000,
                'stock' => 20,
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'slug' => Str::slug('Samsung Galaxy S24 Ultra'),
                'category_id' => 1,
                'description' => 'Điện thoại flagship của Samsung với màn hình AMOLED 120Hz và bút S-Pen.',
                'price' => 32990000,
                'stock' => 15,
            ],
            [
                'name' => 'MacBook Air M3 2025',
                'slug' => Str::slug('MacBook Air M3 2025'),
                'category_id' => 2,
                'description' => 'Laptop mỏng nhẹ của Apple, chip M3 mới, pin 18 giờ, cực kỳ hiệu quả cho công việc.',
                'price' => 28990000,
                'stock' => 10,
            ],
            [
                'name' => 'Dell XPS 13 Plus',
                'slug' => Str::slug('Dell XPS 13 Plus'),
                'category_id' => 2,
                'description' => 'Laptop cao cấp của Dell với màn hình InfinityEdge và bàn phím cảm ứng hiện đại.',
                'price' => 31990000,
                'stock' => 8,
            ],
            [
                'name' => 'iPad Pro M2 12.9 inch',
                'slug' => Str::slug('iPad Pro M2 12.9 inch'),
                'category_id' => 3,
                'description' => 'Máy tính bảng mạnh mẽ với chip Apple M2, hỗ trợ Apple Pencil 2 và Magic Keyboard.',
                'price' => 28990000,
                'stock' => 12,
            ],
            [
                'name' => 'Samsung Galaxy Tab S9 Ultra',
                'slug' => Str::slug('Samsung Galaxy Tab S9 Ultra'),
                'category_id' => 3,
                'description' => 'Tablet cao cấp với màn hình AMOLED 14.6 inch và bút S-Pen đi kèm.',
                'price' => 25990000,
                'stock' => 7,
            ],
            [
                'name' => 'Apple Watch Series 10',
                'slug' => Str::slug('Apple Watch Series 10'),
                'category_id' => 4,
                'description' => 'Đồng hồ thông minh mới nhất của Apple, theo dõi sức khỏe và hỗ trợ ECG.',
                'price' => 11990000,
                'stock' => 30,
            ],
            [
                'name' => 'AirPods Pro 2',
                'slug' => Str::slug('AirPods Pro 2'),
                'category_id' => 4,
                'description' => 'Tai nghe không dây của Apple với chống ồn chủ động và sạc MagSafe.',
                'price' => 6490000,
                'stock' => 25,
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'slug' => Str::slug('Logitech MX Master 3S'),
                'category_id' => 4,
                'description' => 'Chuột không dây cao cấp dành cho dân văn phòng và lập trình viên.',
                'price' => 2590000,
                'stock' => 40,
            ],
            [
                'name' => 'Asus ROG Zephyrus G14',
                'slug' => Str::slug('Asus ROG Zephyrus G14'),
                'category_id' => 2,
                'description' => 'Laptop gaming siêu nhẹ với chip Ryzen 9 và GPU RTX 4070, hiệu năng cực mạnh.',
                'price' => 39990000,
                'stock' => 0, // hết hàng
            ],
        ];

        foreach ($products as $product) {
            // Nếu stock = 0 thì out_of_stock, ngược lại in_stock
            $product['status'] = $product['stock'] == 0 ? 'out_of_stock' : 'in_stock';
            Product::create($product);
        }
    }
}
