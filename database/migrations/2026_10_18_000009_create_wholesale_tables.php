<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wholesale_settings', function (Blueprint $table) {
            $table->string('id')->primary()->default('default');
            $table->text('hero_headline_en')->nullable();
            $table->text('hero_headline_km')->nullable();
            $table->text('hero_sub_headline_en')->nullable();
            $table->text('hero_sub_headline_km')->nullable();
            $table->string('hero_image')->nullable();
            $table->text('delivery_coverage_en')->nullable();
            $table->text('delivery_coverage_km')->nullable();
            $table->text('minimum_order_text_en')->nullable();
            $table->text('minimum_order_text_km')->nullable();
            $table->timestamps();
        });

        Schema::create('wholesale_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_km')->default('');
            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();
            $table->string('icon')->default('package');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wholesale_steps');
        Schema::dropIfExists('wholesale_settings');
    }
};