<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Thức ăn cho chó',
            'price' => 250000,
            'stock' => 80,
            'image' => '/images/sp1.jpg',
        ]);

        Product::create([
            'name' => 'Sữa cho mèo con',
            'price' => 120000,
            'stock' => 120,
            'image' => '/images/sp2.jpg',
        ]);

        Product::create([
            'name' => 'Pate cho mèo',
            'price' => 40000,
            'stock' => 15,
            'image' => '/images/sp3.jpg', 
        ]);

        Product::create([
            'name' => 'Cát vệ sinh cho mèo',
            'price' => 70000,
            'stock' => 200,
            'image' => '/images/sp4.jpg',
        ]);

        Product::create([
            'name' => 'Đồ chơi cho chó',
            'price' => 25000,
            'stock' => 30,
            'image' => '/images/sp5.jpg',
        ]);
        
        Product::create([
            'name' => 'Dây dắt chó co giãn',
            'price' => 95000,
            'stock' => 100,
            'image' => '/images/sp6.jpg',
        ]);

        Product::create([
            'name' => 'Lồng Hamster',
            'price' => 100000,
            'stock' => 180,
            'image' => '/images/sp7.jpg',
        ]);

        Product::create([
            'name' => 'Nhà cây cho mèo',
            'price' => 600000,
            'stock' => 20,
            'image' => '/images/sp8.jpg',
        ]);

        Product::create([
            'name' => 'Áo cho chó Evisu',
            'price' => 180000,
            'stock' => 70,
            'image' => '/images/sp9.jpg',
        ]);

        Product::create([
            'name' => 'Lót chuồng hamster',
            'price' => 40000,
            'stock' => 250,
            'image' => '/images/sp10.jpg',
        ]);

        Product::create([
            'name' => 'Cỏ mèo', 
            'price' => 15000,
            'stock' => 75,
            'image' => '/images/sp11.jpg',
        ]);

        Product::create([
            'name' => 'Đồ chơi mèo', 
            'price' => 30000,
            'stock' => 150,
            'image' => '/images/sp12.jpg',
        ]);
    }
}
