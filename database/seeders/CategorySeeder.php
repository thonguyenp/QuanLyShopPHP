<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories = [
            [
                "name" => "Smartphone",
                "slug" => "smartphone",
                "description" => "Điện thoại di động có tích hợp nhiều tính năng và khả năng xử lý thông minh",
                "image" => "uploads/categories/smartphone.png"
            ],
            [
                "name" => "Laptop",
                "slug" => "laptop",
                "description" => "một máy tính cá nhân nhỏ gọn, có tính di động cao",
                "image" => "uploads/categories/laptop.png"
            ],
            [
                "name" => "Tablet",
                "slug" => "tablet",
                "description" => "thiết bị điện tử di động có màn hình cảm ứng lớn hơn điện thoại, nhưng nhỏ hơn laptop",
                "image" => "uploads/categories/tablet.png"
            ],
            [
                "name" => "Accessory",
                "slug" => "accessory",
                "description" => "Các phụ kiện thông minh",
                "image" => "uploads/categories/accessory.png"
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
