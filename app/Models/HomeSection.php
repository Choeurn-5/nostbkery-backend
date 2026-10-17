<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = [
        'section_key',
        'headline_en',
        'headline_km',
        'sub_headline_en',
        'sub_headline_km',
        'body_en',
        'body_km',
        'button_label_en',
        'button_label_km',
        'button_link',
        'button2_label_en',
        'button2_label_km',
        'button2_link',
        'image',
        'video_url',
        'is_visible',
        'sort_order',
        'extra_data',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'sort_order' => 'integer',
        'extra_data' => 'array',
    ];
}