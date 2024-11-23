<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Course;
use App\Models\Progress;
use App\Models\Review;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index($course, Content $content = null)
    {
        if ($course && $content) {
            $course = Course::find($content->course_id);

            // Check if lesson progress already exists for the requested user
            $progress = Progress::where('content_id', $content->id)
                ->where('student_id', auth()->user()->id)
                ->first();
            $status = $progress?->status;

            // Update course user enrollment pivot relationship
            $course_user = $course->users()->wherePivot('user_id', auth()->user()->id)->first()->pivot;
            if ($course_user && $course_user->status == 0) {
                $course_user->status = 2;
                $course_user->save();
            }

            // Create a progress and mark the lesson as started if there are is no current progression record for the requested user
            if (!$progress) {
                $new_progress = new Progress();
                $new_progress->content_id = $content->id;
                $new_progress->student_id = auth()->user()->id;
                $new_progress->started_at = now();
                $new_progress->status = 2;
                $new_progress->save();

                $status = $new_progress->status;
            }

            // If progress already exists, mark the lesson as started
            if ($progress && $progress->status == 0) {
                $progress->started_at = now();
                $progress->status = 2;
                $progress->save();
            }

            // Fetch Zoom meetings for the current course
            $zoom_meetings = ZoomMeeting::where('course_id', $course->id)->get();

            return view('student.lesson', compact('content', 'course', 'status', 'zoom_meetings'));
        }

        if ($course && !$content) {
            $user = auth()->user()->id;
            $course = Course::where('slug', $course)->firstOrFail();
            $certfcateArray = json_decode($course->certificate, true);
            $course_date = $course->created_at;
            $course_name = $course->name;

            array_walk_recursive($certfcateArray, function (&$value, $key) use ($user, $course_date, $course_name) {
                if ($value === '{NAME}') {
                    $value = auth()->user()->name;
                }
                if (is_string($value) && strpos($value, '{DATE}') !== false) {

                    $value = str_replace('{DATE}', $course_date, $value);
                }
                if (is_string($value) && strpos($value, '{COURSE}') !== false) {

                    $value = str_replace('{COURSE}', $course_name, $value);
                }
            });

            $course->certificate = json_encode($certfcateArray);

            // Check if user is enrolled in the course
            $enrolled = 0;
            $enrolled_courses = auth()->user()->courses()->get();

            // Check if user has completed the course
            $completed = 0;

            foreach ($enrolled_courses as $enrolled_course) {
                if ($enrolled_course->id == $course->id) {
                    $enrolled = 1;
                    $contents = $enrolled_course->contents;
                    $completed_lessons = 0;
                    foreach ($contents as $content) {
                        $progress = Progress::where('student_id', auth()->user()->id)->where('content_id', $content->id)->where('status', 1)->first();
                        if ($progress && $progress->count() > 0) {
                            $completed_lessons++;
                        }
                    }
                    if ($completed_lessons == $contents->count()) {
                        $completed = 1;
                    }
                }
            }

            // Get Reviews
            $reviews = Review::where('course_id', $course->id)
                ->orderBy('created_at', 'desc')
                ->get();


            // Fetch Zoom meetings for the current course
            $zoom_meetings = ZoomMeeting::where('course_id', $course->id)->get();

            return view('student.course', compact('course', 'enrolled', 'completed', 'reviews', 'zoom_meetings'));
        }
    }

    public function explore()
    {
        $user = auth()->user();
        $courses = Course::published()->notEnrolled($user);

        $skeletons = 4;
        $courseCount = 0;
        if ($courses) {
            $courseCount = $courses->count();
        }
        if ($skeletons >= $courseCount) {
            $skeletons = $skeletons - $courseCount;
        } else {
            $skeletons = 0;
        }

        $courses = $courses->get();
        return view('student.explore-courses', compact('courses', 'skeletons'));
    }

    public function enrolled()
    {
        $user = auth()->user();
        $courses = $user->courses()?->wherePivotIn('status', [0, 1, 2]);

        $skeletons = 4;
        $courseCount = 0;
        if ($courses) {
            $courseCount = $courses->count();
        }
        if ($skeletons >= $courseCount) {
            $skeletons = $skeletons - $courseCount;
        } else {
            $skeletons = 0;
        }

        $courses = $courses->get();
        return view('student.enrolled-courses', compact('courses', 'skeletons'));
    }

    public function courseRating(Request $request)
    {
        try {
            $request->validate([
                'course_id' => 'required',
                'rating' => 'required',
                'review' => 'required|string',
            ]);

            $new_review = new Review();
            $new_review->user_id = auth()->user()->id;
            $new_review->course_id = $request->course_id;
            $new_review->rating = $request->rating;
            $new_review->review = $request->review;
            $new_review->save();

            return response()->json(['success' => 'Review submitted successfully']);
        } catch (\Exception $e) {
            // Log the error message for debugging
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to submit review'], 500);
        }
    }

    public function fetchReviews(Course $course)
    {
        $reviews = $course->reviews->sortByDesc('created_at');
        return view('student.partials.reviews', compact('reviews', 'course'));
    }


    public function zoomMeetings($courseSlug)
    {
        // Fetch the course based on the slug
        $course = Course::where('slug', $courseSlug)->firstOrFail();

        // Fetch zoom meetings associated with the course
        $zoom_meetings = ZoomMeeting::where('course_id', $course->id)->get();

        // Pass the fetched data to the view
        return view('student.zoom-details', compact('course', 'zoom_meetings'));
    }

}
