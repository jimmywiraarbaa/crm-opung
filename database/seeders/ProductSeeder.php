<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Black Sabat',
                'price' => 25000,
                'description' => 'Chocolate waffle with chocholate sauce, Vanilla ice cream and oreo',
                'category' => 'Makanan',
                'image' => 'images/menu/waffle-black-sabat.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Waffle Nishi Sumatora',
                'price' => 25000,
                'description' => 'Waffle series nishi sumatora',
                'category' => 'Makanan',
                'image' => 'images/menu/regg-rum.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Vanilla Orange 600ml',
                'price' => 55000,
                'description' => 'Minuman rasa vanilla orange dengan ukuran botol 600ml',
                'category' => 'Minuman',
                'image' => 'images/menu/regg-rum.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Arengga',
                'price' => 22000,
                'description' => 'Minuman Espresso, Palm Sugar, Fresh Milk',
                'category' => 'Minuman',
                'image' => 'images/menu/regg-rum.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dancing Caramelo',
                'price' => 25000,
                'description' => 'Original waffle with caramek sauce, vanilla ice cream, sprinkle of almonds',
                'category' => 'Makanan',
                'image' => 'images/menu/regg-rum.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocup Bliss',
                'price' => 25000,
                'description' => 'Diced waffle with double ice cream, chocholate Souce, and oreo crumb on top',
                'category' => 'Makanan',
                'image' => 'images/menu/regg-rum.jpg',
                'stock' => rand(10, 100),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('products')->insert($data);
    }
}
