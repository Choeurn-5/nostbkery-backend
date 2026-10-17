<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WholesaleStep extends Model
{
    protected $fillable = [
        'title_en',
        'title_km',
        'description_en',
        'description_km',
        'icon',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];
}