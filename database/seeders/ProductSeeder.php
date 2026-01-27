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

        \App\Models\Product::create([
            'name' => 'Dark Bravo',
            'slug' => 'dark-bravo',
            'category_id' => $chocolateId,
            'tagline' => 'Rich dark chocolate with a smooth, velvety texture',
            'description' => 'Indulge in the rich, velvety experience of nuestra premiere Dark Bravo chocolate. Handcrafted with the finest cocoa beans and a hint of natural vanilla, this masterpiece offers a complex flavor profile that satisfies the most sophisticated palates.',
            'image' => 'products/bravo.png',
            'features' => ['Premium', 'Chocolate', 'Dark'],
            'weight' => '100g / 250g / 500g',
            'ingredients' => 'Cocoa Mass, Sugar, Cocoa Butter',
            'shelf_life' => '12 Months',
            'storage' => 'Cool & Dry Place',
            'is_visible_on_home' => true,
        ]);

        \App\Models\Product::create([
            'name' => 'Juicy Jelly',
            'slug' => 'juicy-jelly',
            'category_id' => $candyId,
            'tagline' => 'Bursting with real fruit flavors in every bite',
            'description' => 'Our Juicy Jelly treats are made with real fruit extracts, providing an explosion of flavor in every bite. Soft, chewy, and perfectly sweet, they are the ideal snack for fruit lovers of all ages.',
            'image' => 'products/juicy-jelly.png',
            'features' => ['Fruity', 'Jelly', 'Natural'],
            'weight' => '50g / 150g',
            'ingredients' => 'Fruit Juice, Sugar, Gelatin',
            'shelf_life' => '6 Months',
            'storage' => 'Room Temperature',
            'is_visible_on_home' => true,
        ]);

        \App\Models\Product::create([
            'name' => 'Dayrio',
            'slug' => 'dayrio',
            'category_id' => $candyId,
            'tagline' => 'Mixed berry delight with a tangy twist',
            'description' => 'Dayrio is a vibrant mix of berry flavors that provides a refreshing and tangy sensation. Each piece is crafted to deliver a balanced sweetness that keeps you reaching for more.',
            'image' => 'products/dayrio.png',
            'features' => ['Berry', 'Sweet', 'Tangy'],
            'weight' => '200g',
            'ingredients' => 'Berry Essence, Sugar, Citric Acid',
            'shelf_life' => '9 Months',
            'storage' => 'Dry Place',
            'is_visible_on_home' => true,
        ]);

        \App\Models\Product::create([
            'name' => 'Coco Delight',
            'slug' => 'coco-delight',
            'category_id' => $candyId,
            'tagline' => 'Tropical coconut flavor in a creamy candy',
            'description' => 'Experience the tropics with Coco Delight. This creamy candy captures the essence of fresh coconuts, offering a rich and milky flavor that melts in your mouth.',
            'image' => 'products/coco.png',
            'features' => ['Coconut', 'Creamy', 'Tropical'],
            'weight' => '150g',
            'ingredients' => 'Coconut Milk, Sugar, Cream',
            'shelf_life' => '10 Months',
            'storage' => 'Cool Place',
            'is_visible_on_home' => true,
        ]);
    }
}
