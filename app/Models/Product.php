<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'slug',
        'name_en',
        'name_km',
        'description_en',
        'description_km',
        'price',
        'compare_at_price',
        'image',
        'image_alt_en',
        'image_alt_km',
        'badges',
        'availability',
        'channel_tags',
        'is_featured',
        'sort_order',
        'status',
        'published_at',
    ];

    protected $casts = [
        'price' => 'float',
        'compare_at_price' => 'float',
        'badges' => 'array',
        'channel_tags' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function promotions(): BelongsToMany
    {
        return $this->belongsToMany(Promotion::class, 'promotion_product');
    }
}