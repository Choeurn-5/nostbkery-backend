<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name_en',
        'name_km',
        'address_en',
        'address_km',
        'hours_en',
        'hours_km',
        'image',
        'image_alt_en',
        'image_alt_km',
        'map_embed_url',
        'directions_link',
        'services',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'services' => 'array',
        'sort_order' => 'integer',
        'is_visible' => 'boolean',
    ];
}