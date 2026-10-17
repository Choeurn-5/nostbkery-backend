<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WholesaleSetting extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'hero_headline_en',
        'hero_headline_km',
        'hero_sub_headline_en',
        'hero_sub_headline_km',
        'hero_image',
        'delivery_coverage_en',
        'delivery_coverage_km',
        'minimum_order_text_en',
        'minimum_order_text_km',
    ];
}