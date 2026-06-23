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
        $chocolateId = \App\Models\Category::where('slug', 'fine-chocolates')->first()->id;
        $candyId = \App\Models\Category::where('slug', 'sweet-candies')->first()->id;
        $biscuitId = \App\Models\Category::where('slug', 'biscuits-and-cookies')->first()->id;

        \App\Models\Product::updateOrCreate(
            ['slug' => 'dark-bravo'],
            [
                'name' => 'Dark Bravo',
                'category_id' => $chocolateId,
                'tagline' => 'Rich dark chocolate with a smooth, velvety texture',
                'description' => 'Indulge in the rich, velvety experience of nuestra premiere Dark Bravo chocolate. Handcrafted with the finest cocoa beans and a hint of natural vanilla, this masterpiece offers a complex flavor profile that satisfies the most sophisticated palates.',
                'long_description' => '<p>Indulge in the rich, velvety experience of nuestra premiere Dark Bravo chocolate. Handcrafted with the finest cocoa beans and a hint of natural vanilla, this masterpiece offers a complex flavor profile that satisfies the most sophisticated palates.</p>',
                'image' => 'products/bravo.png',
                'gallery' => [],
                'features' => ['Premium', 'Chocolate', 'Dark'],
                'is_visible_on_home' => true,
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'juicy-jelly'],
            [
                'name' => 'Juicy Jelly',
                'category_id' => $candyId,
                'tagline' => 'Bursting with real fruit flavors in every bite',
                'description' => 'Our Juicy Jelly treats are made with real fruit extracts, providing an explosion of flavor in every bite. Soft, chewy, and perfectly sweet, they are the ideal snack for fruit lovers of all ages.',
                'long_description' => '<p>Our Juicy Jelly treats are made with real fruit extracts, providing an explosion of flavor in every bite. Soft, chewy, and perfectly sweet, they are the ideal snack for fruit lovers of all ages.</p>',
                'image' => 'products/juicy-jelly.png',
                'gallery' => [],
                'features' => ['Fruity', 'Jelly', 'Natural'],
                'is_visible_on_home' => true,
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'dayrio'],
            [
                'name' => 'Dayrio',
                'category_id' => $candyId,
                'tagline' => 'Mixed berry delight with a tangy twist',
                'description' => 'Dayrio is a vibrant mix of berry flavors that provides a refreshing and tangy sensation. Each piece is crafted to deliver a balanced sweetness that keeps you reaching for more.',
                'long_description' => '<p>Dayrio is a vibrant mix of berry flavors that provides a refreshing and tangy sensation. Each piece is crafted to deliver a balanced sweetness that keeps you reaching for more.</p>',
                'image' => 'products/dayrio.png',
                'gallery' => [],
                'features' => ['Berry', 'Sweet', 'Tangy'],
                'is_visible_on_home' => true,
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'coco-delight'],
            [
                'name' => 'Coco Delight',
                'category_id' => $candyId,
                'tagline' => 'Tropical coconut flavor in a creamy candy',
                'description' => 'Experience the tropics with Coco Delight. This creamy candy captures the essence of fresh coconuts, offering a rich and milky flavor that melts in your mouth.',
                'long_description' => '<p>Experience the tropics with Coco Delight. This creamy candy captures the essence of fresh coconuts, offering a rich and milky flavor that melts in your mouth.</p>',
                'image' => 'products/coco.png',
                'gallery' => [],
                'features' => ['Coconut', 'Creamy', 'Tropical'],
                'is_visible_on_home' => true,
            ]
        );
    }
}
