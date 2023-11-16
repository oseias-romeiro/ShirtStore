<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Spring Collection', 'slug' => 'spring-collection', 'description' => 'Fresh and vibrant shirts for the spring season', 'icon' => 'fa-solid fa-fan']);
        Category::create(['name' => 'Summer Vibes', 'slug' => 'summer-vibes', 'description' => 'Cool and breezy shirts perfect for the summer', 'icon' => 'fa-solid fa-sun']);
        Category::create(['name' => 'Fall Essentials', 'slug' => 'fall-essentials', 'description' => 'Warm and stylish shirts for the fall season', 'icon' => 'fa-brands fa-canadian-maple-leaf']);
        Category::create(['name' => 'Winter Wonderland', 'slug' => 'winter-wonderland', 'description' => 'Cozy and comfortable shirts for the winter season', 'icon' => 'fa-regular fa-snowflake']);
        Category::create(['name' => 'Office Attire', 'slug' => 'office-attire', 'description' => 'Formal shirts suitable for the office environment', 'icon' => 'fa-solid fa-building']);
        Category::create(['name' => 'Casual Comfort', 'slug' => 'casual-comfort', 'description' => 'Relaxed and easygoing shirts for casual occasions', 'icon' => 'fa-solid fa-shirt']);
        Category::create(['name' => 'Active Wear', 'slug' => 'active-wear', 'description' => 'Sporty shirts designed for an active lifestyle', 'icon' => 'fa-solid fa-volleyball']);
        Category::create(['name' => 'Weatherproof Styles', 'slug' => 'weatherproof-styles', 'description' => 'Shirts suitable for all weather conditions', 'icon' => 'fa-solid fa-cloud']);
    }
}
