<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promotion extends Model
{
    protected $fillable = [
        'title_en',
        'title_km',
        'badge_text_en',
        'badge_text_km',
        'description_en',
        'description_km',
        'image',
        'image_alt_en',
        'image_alt_km',
        'start_date',
        'end_date',
        'daily_start_time',
        'daily_end_time',
        'fine_print_en',
        'fine_print_km',
        'show_on_home',
        'status',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'promotion_product');
    }
}