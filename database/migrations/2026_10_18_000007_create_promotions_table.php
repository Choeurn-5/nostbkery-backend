<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_km')->default('');
            $table->string('badge_text_en')->nullable();
            $table->string('badge_text_km')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();
            $table->string('image')->nullable();
            $table->string('image_alt_en')->nullable();
            $table->string('image_alt_km')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('daily_start_time')->nullable();
            $table->string('daily_end_time')->nullable();
            $table->text('fine_print_en')->nullable();
            $table->text('fine_print_km')->nullable();
            $table->boolean('show_on_home')->default(false);
            $table->string('status')->default('PUBLISHED');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};