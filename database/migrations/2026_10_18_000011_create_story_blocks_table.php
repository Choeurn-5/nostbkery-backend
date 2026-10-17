<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('story_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('heading_en');
            $table->string('heading_km')->default('');
            $table->text('text_en')->nullable();
            $table->text('text_km')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt_en')->nullable();
            $table->string('image_alt_km')->nullable();
            $table->string('layout')->default('IMAGE_LEFT');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('story_blocks');
    }
};