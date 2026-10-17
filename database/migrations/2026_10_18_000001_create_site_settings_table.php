<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->string('id')->primary()->default('default');
            $table->string('logo_light')->nullable();
            $table->string('logo_dark')->nullable();
            $table->json('phone_numbers')->nullable();
            $table->string('email')->default('info@nostbakery.com');
            $table->string('telegram_link')->default('https://t.me/NostBakery');
            $table->string('facebook_link')->default('https://www.facebook.com/NOSTBakeryPastry');
            $table->string('website_url')->default('nostbakery.com');
            $table->text('address_en')->nullable();
            $table->text('address_km')->nullable();
            $table->text('seo_title_en')->nullable();
            $table->text('seo_title_km')->nullable();
            $table->text('seo_description_en')->nullable();
            $table->text('seo_description_km')->nullable();
            $table->string('og_image')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->text('cookie_notice_text_en')->nullable();
            $table->text('cookie_notice_text_km')->nullable();
            $table->text('footer_text_en')->nullable();
            $table->text('footer_text_km')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};