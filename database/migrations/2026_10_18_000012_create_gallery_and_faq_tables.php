<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('IMAGE');
            $table->string('url');
            $table->string('caption_en')->nullable();
            $table->string('caption_km')->nullable();
            $table->string('alt_en')->nullable();
            $table->string('alt_km')->nullable();
            $table->boolean('show_on_home')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('faq_items', function (Blueprint $table) {
            $table->id();
            $table->text('question_en');
            $table->text('question_km')->nullable();
            $table->text('answer_en');
            $table->text('answer_km')->nullable();
            $table->string('section')->default('wholesale');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text_en');
            $table->text('text_km')->nullable();
            $table->integer('rating')->default(5);
            $table->string('photo')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('form_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('type')->default('RETAIL');
            $table->text('message')->nullable();
            $table->string('status')->default('NEW');
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->string('page_slug')->unique();
            $table->text('title_en')->nullable();
            $table->text('title_km')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();
            $table->string('og_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_seos');
        Schema::dropIfExists('form_submissions');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('faq_items');
        Schema::dropIfExists('gallery_items');
    }
};