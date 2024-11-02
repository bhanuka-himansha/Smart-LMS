<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function completeLesson($id)
    {
        try {
            $progress = Progress::where('content_id', $id)->where('student_id', auth()->user()->id)->first();
            $progress->ended_at = now();
            $progress->status = 1;
            $progress->save();

            $enrolled_course = Content::find($id)->course;
            $complete_count = 0;
            $total_lessons = $enrolled_course->contents->count();

            $progress_lessons = Progress::where('student_id', auth()->user()->id)
                ->whereHas('content', function ($query) use ($enrolled_course) {
                    $query->where('course_id', $enrolled_course->id);
                })->get();

            foreach ($progress_lessons as $progress_lesson) {
                if ($progress_lesson->status == 1) {
                    $complete_count += 1;
                }
            }

            if ($total_lessons == $complete_count) {
                $enrolled_course = $enrolled_course->users()->wherePivot('user_id', auth()->user()->id)->first()->pivot;
                $enrolled_course->status = 1;
                $enrolled_course->save();
            }

            $notify[] = ['success', 'Successfully completed the lesson.'];
            return back()->withNotify($notify);
        } catch (\Exception $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }
}
