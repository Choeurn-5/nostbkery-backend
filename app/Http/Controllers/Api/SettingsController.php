<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\AnnouncementBar;
use App\Models\PageSeo;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    public function getSettings(): JsonResponse
    {
        $settings = SiteSetting::find('default');
        $announcement = AnnouncementBar::where('is_active', true)->find('default');

        return response()->json([
            'success' => true,
            'data' => [
                'settings' => $settings,
                'announcement' => $announcement,
            ],
        ]);
    }

    public function getAnnouncement(): JsonResponse
    {
        $announcement = AnnouncementBar::where('is_active', true)->first();

        return response()->json([
            'success' => true,
            'data' => $announcement,
        ]);
    }

    public function getPageSeo(string $slug): JsonResponse
    {
        $seo = PageSeo::where('page_slug', $slug)->first();

        return response()->json([
            'success' => true,
            'data' => $seo,
        ]);
    }
}
