<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = [
        'page_slug',
        'title_en',
        'title_km',
        'description_en',
        'description_km',
        'og_image',
    ];
}