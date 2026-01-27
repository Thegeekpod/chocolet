<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name' => 'Biscuits & Cookies',
            'slug' => 'biscuits-and-cookies',
            'image' => 'categories/biscuit.png',
            'is_visible_on_home' => true,
        ]);

        \App\Models\Category::create([
            'name' => 'Sweet Candies',
            'slug' => 'sweet-candies',
            'image' => 'categories/candy.png',
            'is_visible_on_home' => true,
        ]);

        \App\Models\Category::create([
            'name' => 'Fine Chocolates',
            'slug' => 'fine-chocolates',
            'image' => 'categories/chocolate.png',
            'is_visible_on_home' => true,
        ]);
    }
}
