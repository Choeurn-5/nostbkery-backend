<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| NOST Bakery & Pastry REST API Routes
|--------------------------------------------------------------------------
*/

// Public Health Check
Route::get('/health', function () {
    return response()->json([
        'status' => 'healthy',
        'service' => 'NOST Bakery Backend API',
        'timestamp' => now()->toIso8601String(),
    ]);
});

// Site Settings & Announcements
Route::get('/settings', [SettingsController::class, 'getSettings']);
Route::get('/announcements', [SettingsController::class, 'getAnnouncement']);
Route::get('/seo/{slug}', [SettingsController::class, 'getPageSeo']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{slug}', [CategoryController::class, 'show']);

// Products
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/favourites', [ProductController::class, 'favourites']);
Route::get('/products/{slug}', [ProductController::class, 'show']);

// Promotions
Route::get('/promotions', [PromotionController::class, 'index']);
Route::get('/promotions/home', [PromotionController::class, 'home']);

// Content & Sections
Route::get('/content/home-sections', [ContentController::class, 'homeSections']);
Route::get('/content/story-blocks', [ContentController::class, 'storyBlocks']);
Route::get('/content/wholesale', [ContentController::class, 'wholesale']);
Route::get('/content/locations', [ContentController::class, 'locations']);
Route::get('/content/faqs', [ContentController::class, 'faqs']);
Route::get('/content/testimonials', [ContentController::class, 'testimonials']);
Route::get('/content/gallery', [ContentController::class, 'gallery']);

// Orders (Checkout & Tracking)
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{orderNumber}', [OrderController::class, 'show']);

// Contact & Inquiries
Route::post('/contact', [ContactController::class, 'submit']);

// Auth Endpoints
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
});
