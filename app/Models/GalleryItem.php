<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'type',
        'url',
        'caption_en',
        'caption_km',
        'alt_en',
        'alt_km',
        'show_on_home',
        'sort_order',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
        'sort_order' => 'integer',
    ];
}