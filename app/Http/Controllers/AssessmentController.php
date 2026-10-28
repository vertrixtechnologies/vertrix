<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AssessmentController extends Controller
{
    /**
     * Store a newly created IT assessment request.
     */
    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'fullName' => 'required|string|min:2|max:150',
            'workEmail' => 'required|email|max:150',
            'companyName' => 'required|string|min:2|max:150',
            'teamSize' => 'required|string|max:50',
            'interestedIn' => 'nullable|string|max:100',
            'wishlist' => 'nullable|string|max:2000',
            'privacyConsent' => 'nullable',
        ]);

        try {
            $assessment = Assessment::create([
                'full_name' => $validated['fullName'],
                'work_email' => $validated['workEmail'],
                'company_name' => $validated['companyName'],
                'team_size' => $validated['teamSize'],
                'interested_in' => $validated['interestedIn'] ?? 'Complete Managed IT',
                'wishlist' => $validated['wishlist'] ?? null,
                'status' => 'pending',
                'ip_address' => $request->ip(),
            ]);

            Log::info("New IT Assessment inquiry received from {$assessment->full_name} ({$assessment->company_name})");

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Your assessment request has been received. Our senior architects will reach out within 2 hours.',
                    'data' => [
                        'id' => $assessment->id,
                        'name' => $assessment->full_name,
                    ],
                ]);
            }

            return redirect()->back()->with('success', 'Your assessment request has been received!');

        } catch (\Exception $e) {
            Log::error('Error storing assessment request: ' . $e->getMessage());

            if ($request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while processing your request. Please try again.',
                ], 500);
            }

            return redirect()->back()->withErrors(['error' => 'Unable to submit assessment. Please try again.']);
        }
    }
}
