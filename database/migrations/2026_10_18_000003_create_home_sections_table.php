<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();
            $table->text('headline_en')->nullable();
            $table->text('headline_km')->nullable();
            $table->text('sub_headline_en')->nullable();
            $table->text('sub_headline_km')->nullable();
            $table->text('body_en')->nullable();
            $table->text('body_km')->nullable();
            $table->string('button_label_en')->nullable();
            $table->string('button_label_km')->nullable();
            $table->string('button_link')->nullable();
            $table->string('button2_label_en')->nullable();
            $table->string('button2_label_km')->nullable();
            $table->string('button2_link')->nullable();
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->json('extra_data')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_sections');
    }
};