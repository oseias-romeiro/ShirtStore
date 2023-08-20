<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create(['name' => 'Produto 1', 'slug' => 'prod1', 'price' => 100, 'old_price' => 120, 'units' => 500, 'sizes' => json_encode(['Small', 'Medium']), 'description' => 'Descrição do Produto 1', 'images' => json_encode(['prod1-1.jpg', 'prod1-2.jpg']), 'colors' => json_encode(['red', 'blue']), 'seller_id' => 2]);
        \App\Models\Product::create(['name' => 'Produto 2', 'slug' => 'prod2', 'price' => 100, 'old_price' => 120, 'units' => 500, 'sizes' => json_encode(['Small', 'Medium']), 'description' => 'Descrição do Produto 2', 'images' => json_encode(['prod2-1.jpg', 'prod2-2.jpg']), 'colors' => json_encode(['red', 'blue']), 'seller_id' => 2]);
    }
}
