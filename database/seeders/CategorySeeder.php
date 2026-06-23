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
        \App\Models\Category::updateOrCreate(
            ['slug' => 'biscuits-and-cookies'],
            [
                'name' => 'Biscuits & Cookies',
                'image' => 'categories/biscuit.png',
                'is_visible_on_home' => true,
            ]
        );

        \App\Models\Category::updateOrCreate(
            ['slug' => 'sweet-candies'],
            [
                'name' => 'Sweet Candies',
                'image' => 'categories/candy.png',
                'is_visible_on_home' => true,
            ]
        );

        \App\Models\Category::updateOrCreate(
            ['slug' => 'fine-chocolates'],
            [
                'name' => 'Fine Chocolates',
                'image' => 'categories/chocolate.png',
                'is_visible_on_home' => true,
            ]
        );
    }
}
