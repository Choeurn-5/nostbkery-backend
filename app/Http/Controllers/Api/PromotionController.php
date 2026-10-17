<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;

class PromotionController extends Controller
{
    public function index(): JsonResponse
    {
        $promotions = Promotion::where('status', 'PUBLISHED')
            ->with(['products' => function ($q) {
                $q->with('images');
            }])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $promotions,
        ]);
    }

    public function home(): JsonResponse
    {
        $promotions = Promotion::where('status', 'PUBLISHED')
            ->where('show_on_home', true)
            ->with(['products' => function ($q) {
                $q->with('images');
            }])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $promotions,
        ]);
    }
}
