<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function enrollStudent($id)
    {
        DB::beginTransaction();

        try {
            $course = Course::with('contents')->find($id);
            $course->users()->attach(auth()->user()->id);
            $course_user = $course->users()->wherePivot('user_id', auth()->user()->id)->first()->pivot;
            $course_user->status = 0;
            $course_user->save();

            foreach ($course->contents as $content) {
                $progress = new Progress();
                $progress->content_id = $content->id;
                $progress->student_id = auth()->user()->id;
                $progress->status = 0;
                $progress->save();
            }

            DB::commit();

            $notify[] = ['success', 'You have successfully enrolled in this course.'];
            return back()->withNotify($notify);
        } catch (\Exception $e) {
            DB::rollBack();

            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }
}
