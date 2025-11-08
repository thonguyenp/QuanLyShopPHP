<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $manufacturers = [
            [
                'name' => 'Anker',
                'slug' => Str::slug('anker'),
                'description' => 'Anker là thương hiệu phụ kiện điện tử của Trung Quốc, chuyên sản xuất các giải pháp sạc thông minh và thiết bị di động',
                'images' => 'anker.jpg',
            ],
        ];

        foreach($manufacturers as $manufacturer)
        {
            Manufacturer::create($manufacturer);
        }
    }
}
