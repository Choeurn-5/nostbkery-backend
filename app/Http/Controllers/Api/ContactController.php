<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function submit(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'nullable|email|max:255',
            'type' => 'required|in:RETAIL,CAKE_ORDER,WHOLESALE',
            'message' => 'required|string|max:2000',
        ]);

        $submission = FormSubmission::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'] ?? null,
            'type' => $validated['type'],
            'message' => $validated['message'],
            'status' => 'NEW',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting NOST Bakery. We will get back to you shortly!',
            'data' => $submission,
        ], 201);
    }
}
