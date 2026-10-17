<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoryBlock extends Model
{
    protected $fillable = [
        'heading_en',
        'heading_km',
        'text_en',
        'text_km',
        'image',
        'image_alt_en',
        'image_alt_km',
        'layout',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_visible' => 'boolean',
    ];
}