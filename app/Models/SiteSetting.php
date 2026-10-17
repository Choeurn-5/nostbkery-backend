<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'logo_light',
        'logo_dark',
        'phone_numbers',
        'email',
        'telegram_link',
        'facebook_link',
        'website_url',
        'address_en',
        'address_km',
        'seo_title_en',
        'seo_title_km',
        'seo_description_en',
        'seo_description_km',
        'og_image',
        'google_analytics_id',
        'facebook_pixel_id',
        'cookie_notice_text_en',
        'cookie_notice_text_km',
        'footer_text_en',
        'footer_text_km',
    ];

    protected $casts = [
        'phone_numbers' => 'array',
    ];
}