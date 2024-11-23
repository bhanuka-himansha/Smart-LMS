<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function globalAnalytics()
    {
        try {
            $user = auth()->user();
            $total_to_do = $user->courses()?->wherePivot('status', 0)->count() ?? 0;
            $total_in_progress = $user->courses()?->wherePivot('status', 2)->count() ?? 0;
            $total_completed = $user->courses()?->wherePivot('status', 1)->count() ?? 0;
            $total_enrolled = $user->courses()?->wherePivotIn('status', [0, 1, 2])->count() ?? 0;
            $countables = [
                'total_to_do' => $total_to_do,
                'total_in_progress' => $total_in_progress,
                'total_completed' => $total_completed,
                'total_enrolled' => $total_enrolled,
            ];
            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved analytics data.',
                'countables' => $countables,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function courseAnalytics(Request $request)
    {
        try {
            $validated = $request->validate([
                'course_id' => 'required|integer|exists:courses,id',
            ]);
            $user = auth()->user();
            $course = Course::findOrFail($validated['course_id']);
            $data = $course;
            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved analytics data.',
                'data' => $data,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
