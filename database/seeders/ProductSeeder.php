<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => "White Elegance Women's T-Shirt",
            'slug' => 'white-female-shrit',
            'price' => 10,
            'old_price' => 20,
            'units' => 500,
            'sizes' => json_encode(['Small', 'Medium', 'Large']),
            'description' => "Elevate your style with our White Elegance Women's T-Shirt. Crafted from premium, breathable fabric, this t-shirt combines comfort with a touch of sophistication. The crisp white color adds a timeless appeal, making it a versatile piece for any wardrobe. Whether you're dressing up for a casual day out or layering for a chic ensemble, this shirt effortlessly complements your fashion sense. Embrace simplicity and elegance with this must-have wardrobe essential.",
            'images' => json_encode(['white-female-shrit_1.jpg', 'white-female-shrit_2.jpg']),
            'colors' => json_encode(['white']),
            'seller_id' => 2,
            'category_id' => 6
        ]);
        Product::create([
            'name' => "Black Classic Men's Shirt",
            'slug' => 'black-male-shrit',
            'price' => 10,
            'old_price' => 20,
            'units' => 500,
            'sizes' => json_encode(['Small', 'Medium']),
            'description' => "Introducing our Black Classic Men's Shirt - a wardrobe staple that effortlessly combines style and comfort. Crafted from high-quality, breathable fabric, this shirt is designed for the modern man who appreciates both sophistication and versatility. The deep black color adds a touch of refinement, making it suitable for various occasions. Whether you're heading to the office, a casual gathering, or a night out, this shirt is the perfect choice. Elevate your wardrobe with this timeless and essential piece that exudes confidence and masculinity.",
            'images' => json_encode(['black-male-shrit_1.jpg', 'black-male-shrit_2.jpg']),
            'colors' => json_encode(['black']),
            'seller_id' => 2,
            'category_id' => 6
        ]);
    }
}
