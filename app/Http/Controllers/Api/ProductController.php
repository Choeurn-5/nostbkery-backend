<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::where('status', 'PUBLISHED')
            ->where('availability', '!=', 'HIDDEN')
            ->with(['category', 'images', 'promotions']);

        // Filter by category slug
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->query('category'));
            });
        }

        // Filter by featured
        if ($request->boolean('featured')) {
            $query->where('is_featured', true);
        }

        // Filter by badge
        if ($request->filled('badge')) {
            $badge = strtoupper($request->query('badge'));
            $query->whereJsonContains('badges', $badge);
        }

        // Filter by channel (RETAIL, WHOLESALE, FROZEN)
        if ($request->filled('channel')) {
            $channel = strtoupper($request->query('channel'));
            $query->whereJsonContains('channel_tags', $channel);
        }

        // Search query
        if ($request->filled('search')) {
            $search = '%' . $request->query('search') . '%';
            $query->where(function ($q) use ($search) {
                $q->where('name_en', 'LIKE', $search)
                  ->orWhere('name_km', 'LIKE', $search)
                  ->orWhere('description_en', 'LIKE', $search)
                  ->orWhere('description_km', 'LIKE', $search);
            });
        }

        $limit = min((int) $request->query('limit', 50), 100);
        $products = $query->orderBy('sort_order')->take($limit)->get();

        return response()->json([
            'success' => true,
            'count' => $products->count(),
            'data' => $products,
        ]);
    }

    public function show(string $slug): JsonResponse
    {
        $product = Product::where('slug', $slug)
            ->where('status', 'PUBLISHED')
            ->with(['category', 'images', 'promotions'])
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $product,
        ]);
    }

    public function favourites(): JsonResponse
    {
        $products = Product::where('status', 'PUBLISHED')
            ->where('is_featured', true)
            ->with(['category', 'images'])
            ->orderBy('sort_order')
            ->take(8)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $products,
        ]);
    }
}
