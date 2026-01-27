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
        'image',
        'features',
        'weight',
        'ingredients',
        'shelf_life',
        'storage',
        'is_visible_on_home',
    ];


    protected $casts = [
        'features' => 'array',
        'is_visible_on_home' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
