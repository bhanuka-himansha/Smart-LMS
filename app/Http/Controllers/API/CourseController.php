<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function explore(Request $request)
    {
        try {
            $user = auth()->user();
            $courses = Course::published()->notEnrolled($user)->get();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved enrolled courses.',
                'enrolled_courses' => $courses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function enrolled()
    {
        try {
            $user = auth()->user();
            $courses = $user->courses()?->wherePivotIn('status', [0, 1, 2])->get();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully retrieved enrolled courses.',
                'enrolled_courses' => $courses,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        if ($query) {
            $courses = Course::published()->where('name', 'LIKE', "%{$query}%")->take(5)->get();
            return response()->json($courses);
        } else {
            return response()->json([]);
        }
    }
}
