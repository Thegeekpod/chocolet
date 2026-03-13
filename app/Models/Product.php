<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'tagline',
        'description',
        'long_description',
        'image',
        'gallery',
        'features',
        'is_visible_on_home',
    ];


    protected $casts = [
        'features' => 'array',
        'gallery' => 'array',
        'is_visible_on_home' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
