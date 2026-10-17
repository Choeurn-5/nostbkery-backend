<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HomeSection;
use App\Models\StoryBlock;
use App\Models\WholesaleSetting;
use App\Models\WholesaleStep;
use App\Models\Location;
use App\Models\FaqItem;
use App\Models\Testimonial;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    public function homeSections(): JsonResponse
    {
        $sections = HomeSection::where('is_visible', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('section_key');

        return response()->json([
            'success' => true,
            'data' => $sections,
        ]);
    }

    public function storyBlocks(): JsonResponse
    {
        $blocks = StoryBlock::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $blocks,
        ]);
    }

    public function wholesale(): JsonResponse
    {
        $settings = WholesaleSetting::find('default');
        $steps = WholesaleStep::orderBy('sort_order')->get();
        $faqs = FaqItem::where('section', 'wholesale')
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'settings' => $settings,
                'steps' => $steps,
                'faqs' => $faqs,
            ],
        ]);
    }

    public function locations(): JsonResponse
    {
        $locations = Location::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $locations,
        ]);
    }

    public function faqs(Request $request): JsonResponse
    {
        $query = FaqItem::where('is_visible', true);
        if ($request->filled('section')) {
            $query->where('section', $request->query('section'));
        }

        $faqs = $query->orderBy('sort_order')->get();

        return response()->json([
            'success' => true,
            'data' => $faqs,
        ]);
    }

    public function testimonials(): JsonResponse
    {
        $testimonials = Testimonial::where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $testimonials,
        ]);
    }

    public function gallery(Request $request): JsonResponse
    {
        $query = GalleryItem::query();
        if ($request->boolean('home')) {
            $query->where('show_on_home', true);
        }

        $items = $query->orderBy('sort_order')->get();

        return response()->json([
            'success' => true,
            'data' => $items,
        ]);
    }
}
