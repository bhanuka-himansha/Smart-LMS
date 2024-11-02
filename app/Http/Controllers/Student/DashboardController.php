<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Progress;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = auth()->user();
        $courses = Course::published()->notEnrolled($user)->get();

        // Analytics Data
        $to_do = $user->courses()?->wherePivot('status', 0)->count() ?? 0;
        $in_progress = $user->courses()?->wherePivot('status', 2)->count() ?? 0;
        $completed = $user->courses()?->wherePivot('status', 1)->count() ?? 0;

        // All enrolled courses
        $enrolled_courses = $user->courses()?->wherePivot('status', 2)->take(3)->get();

        $latest_course = $user->courses()?->latest()->first();
        $completion_rate = 0;
        if (($completed > 0) && ($user->courses()?->count() > 0)) {
            $completion_rate = $completed / $user->courses()?->count() * 100;
        }

        return view('dashboard', compact('courses', 'enrolled_courses', 'to_do', 'in_progress', 'completed', 'latest_course', 'completion_rate'));
    }
}
