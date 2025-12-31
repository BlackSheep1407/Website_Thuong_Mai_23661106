<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WebsiteSetting;
use App\Models\Slider;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Thêm logo hiện tại
        WebsiteSetting::updateOrCreate(
            ['setting_key' => 'logo'],
            [
                'setting_value' => 'main_home/img/logo/logo.png',
                'setting_type' => 'image',
            ]
        );

        // Thêm favicon hiện tại
        WebsiteSetting::updateOrCreate(
            ['setting_key' => 'favicon'],
            [
                'setting_value' => 'main_home/img/logo/favicon.ico',
                'setting_type' => 'image',
            ]
        );



        // Thêm các slider banner hiện tại (tránh duplicate)
        $sliders = [
            [
                'title' => 'Chào mừng đến với 2Tfresh Market',
                'description' => 'Gian hàng trái cây trực tuyến tươi và tốt cho sức khỏe',
                'image_path' => 'main_home/img/bannerqc/Bannerqc.jpg',
                'link' => '#',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Trái cây tươi ngon',
                'description' => 'Chất lượng cao, nguồn gốc rõ ràng',
                'image_path' => 'main_home/img/bannerqc/bannerqc2.webp',
                'link' => '#',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Giao hàng tận nơi',
                'description' => 'Nhanh chóng và an toàn',
                'image_path' => 'main_home/img/bannerqc/Banner qc3.webp',
                'link' => '#',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Giá cả hợp lý',
                'description' => 'Phục vụ mọi khách hàng',
                'image_path' => 'main_home/img/bannerqc/bannerqc4.webp',
                'link' => '#',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Hỗ trợ 24/7',
                'description' => 'Luôn sẵn sàng phục vụ quý khách',
                'image_path' => 'main_home/img/bannerqc/bannerqc5.webp',
                'link' => '#',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            // Sử dụng updateOrCreate để tránh duplicate
            Slider::updateOrCreate(
                [
                    'title' => $slider['title'],
                    'image_path' => $slider['image_path']
                ],
                $slider
            );
        }
    }
}
