<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::truncate();

        \App\Models\Setting::create([
            'site_name' => 'Chocolet',
            'footer_text' => 'Bringing sweetness and joy to every corner of the world with our premium confectionery products. Quality you can taste, trust you can feel.',
            'contact_email' => 'info@chocolet.com',
            'contact_phone' => '+91 999 999 9999',
            'address' => 'Chocolet India, Main Road, New Delhi',
            'facebook_url' => '#',
            'instagram_url' => '#',
            'twitter_url' => '#',
            'linkedin_url' => '#',
            'youtube_url' => '#',

            // Hero Section
            'hero_subheading' => 'Quality Products of <span class="highlight">ASHA Group</span>',
            'hero_title' => 'WELCOME TO <br /><span class="brand-text">Chocolet</span>',
            'hero_description' => 'Chocolet is a leading manufacturer and exporter of high-quality confectionery products, bringing sweetness and joy to every corner of the world with our premium ingredients and innovative flavors.',
            'hero_slides' => [
                ['bg' => 'home/watermelon-bg.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/coconut-bg.png', 'prod' => 'products/coco.png'],
                ['bg' => 'home/strawberry-bg.png', 'prod' => 'home/strawberry-prod.png'],
                ['bg' => 'home/mango-bg.png', 'prod' => 'products/juicy-jelly.png'],
                ['bg' => 'home/berries-bg.png', 'prod' => 'products/dayrio.png'],
                ['bg' => 'home/bravo-bg.png', 'prod' => 'products/bravo.png'],
            ],

            // About Section
            'about_label' => 'Our Story',
            'about_title' => 'Crafting Sweet Memories Since 1999',
            'about_description_1' => 'At Chocolet, we believe that every piece of confectionery tells a story. What started as a humble passion for quality sweets has grown into a global legacy of taste and innovation.',
            'about_description_2' => 'We combine traditional recipes with modern technology to create products that spark joy in every bite. From rich chocolates to playful gummies, our mission remains simple: to make the world a sweeter place.',
            'about_image' => 'home/about-bravo.jpg',
            'about_years' => '25+',
            'about_countries' => '50+',

            // Stats
            'stat_1_val' => '100',
            'stat_1_text' => 'Premium Products',
            'stat_2_val' => '50',
            'stat_2_text' => 'Global Export',
            'stat_3_val' => '1000',
            'stat_3_text' => 'Happy Clients',

            // Featured Products Section
            'featured_products_title' => 'Featured Products',
            'featured_products_json' => [
                ['bg' => 'home/about-bravo.jpg', 'logo' => 'home/featured-cola-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-cola-bg.jpg', 'logo' => 'home/featured-cola-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-berry-bg.jpg', 'logo' => 'home/featured-berry-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-imly-bg.jpg', 'logo' => 'home/featured-imly-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-juicy-bg.jpg', 'logo' => 'home/featured-juicy-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-rolla-bg.jpg', 'logo' => 'home/featured-rolla-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-snow-bg.jpg', 'logo' => 'home/featured-snow-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-coco-bg.png', 'logo' => 'home/featured-coco-logo.png', 'prod' => 'home/watermelon-prod.png'],
                ['bg' => 'home/featured-juicyjelly-bg.jpg', 'logo' => 'home/featured-juicyjelly-logo.png', 'prod' => 'home/watermelon-prod.png'],
            ],

            // Brands Section
            'brands_data' => [
                'biscuits' => [
                    'title' => 'Biscuits And Cookies',
                    'desc' => 'Our range of products include 3 Pm, Biskins, Celio, Chocobis, Cookie bits, Dark Bravo, Little Lunch, Waffles and more.',
                    'link' => '/products',
                    'main_img' => 'home/brands-biscuits.png',
                    'logos' => ['home/brand-logo-default.png', 'home/brand-logo-default.png', 'home/brand-logo-default.png', 'home/brand-logo-default.png', 'home/brand-logo-default.png']
                ],
                'bubble-gums' => [
                    'title' => 'Bubble Gums',
                    'desc' => 'Chewy and flavorful bubble gums in various exciting flavors.',
                    'link' => '/products',
                    'main_img' => 'home/brands-biscuits.png',
                    'logos' => ['home/brand-logo-default.png']
                ],
                'cakes' => [
                    'title' => 'Cakes',
                    'desc' => 'Soft, moist and delicious cakes for every occasion.',
                    'link' => '/products',
                    'main_img' => 'home/brands-biscuits.png',
                    'logos' => ['home/brand-logo-default.png']
                ],
                'candies' => [
                    'title' => 'Candies',
                    'desc' => 'A wide variety of sweet and tangy candies.',
                    'link' => '/products',
                    'main_img' => 'home/brands-biscuits.png',
                    'logos' => ['home/brand-logo-default.png']
                ],
                'chocolates' => [
                    'title' => 'Chocolates',
                    'desc' => 'Premium chocolates crafted with the finest cocoa.',
                    'link' => '/products',
                    'main_img' => 'home/brands-biscuits.png',
                    'logos' => ['home/brand-logo-default.png']
                ]

            ],

            // Why Choose Us
            'why_title' => 'Why Choose Chocolet?',
            'why_features' => [
                ['icon' => 'fas fa-certificate', 'title' => 'World-Class Quality', 'desc' => 'We adhere to strict international quality standards, ensuring every bite is safe and delicious.'],
                ['icon' => 'fas fa-globe-americas', 'title' => 'Global Presence', 'desc' => 'With exports to over 50 countries, Chocolet brings premium confectionery to the global stage.'],
                ['icon' => 'fas fa-flask', 'title' => 'Innovative Flavors', 'desc' => 'Our R&D team constantly experiments to bring you unique, exciting flavors.'],
            ]
        ]);
    }
}
