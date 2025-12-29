<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Iluminate\Support\Facades\DB;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BD:table('fruits')->insert([
            [
                'name' => 'Bưởi da xanh',
                'slug' => 'buoi-da-xanh',
                'description' => 'Bưởi da xanh là một loại trái cây đặc sản nổi tiếng của miền Tây Nam Bộ, Việt Nam. Quả bưởi có vỏ màu xanh đậm, thịt quả ngọt, mọng nước và có hương vị thơm ngon đặc trưng.',
                'price' => 45000.00,
                'image' => 'buoi_da_xanh.jpg',
                'stock' => 100,
            ],
            [
                'name' => 'Xoài cát Hòa Lộc',
                'slug' => 'xoai-cat-hoa-loc',
                'description' => 'Xoài cát Hòa Lộc là một trong những giống xoài ngon nhất của Việt Nam, nổi tiếng với vị ngọt đậm đà và hương thơm đặc trưng. Quả xoài có màu vàng tươi và thịt quả mềm mịn.',
                'price' => 60000.00,
                'image' => 'xoai_cat_hoa_loc.jpg',
                'stock' => 150,
            ],
            // Thêm nhiều loại trái cây khác nếu cần
        ]);
    }
}
