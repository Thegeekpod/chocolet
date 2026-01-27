<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'footer_logo',
        'footer_text',
        'contact_email',
        'contact_phone',
        'address',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'hero_subheading',
        'hero_title',
        'hero_description',
        'hero_slides',
        'about_label',
        'about_title',
        'about_description_1',
        'about_description_2',
        'about_image',
        'about_years',
        'about_countries',
        'stat_1_val',
        'stat_1_text',
        'stat_2_val',
        'stat_2_text',
        'stat_3_val',
        'stat_3_text',
        'featured_products_title',
        'featured_products_json', 'brands_data', 'why_title', 'why_features',
    ];

    protected $casts = [
        'hero_slides' => 'array',
        'featured_products_json' => 'array', 'brands_data' => 'array', 'why_features' => 'array',
    ];
}
