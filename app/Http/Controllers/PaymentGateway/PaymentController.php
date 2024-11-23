<?php

namespace App\Http\Controllers\PaymentGateway;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function initiate(Request $request)
    {
        try {
            $validated = $request->validate([
                'course_id' => 'required|integer|exists:courses,id',
                'gateway' => 'required|string',
            ]);

            if (Route::has($validated['gateway'] . '.checkout')) {
                Session::flash('course_id', $validated['course_id']);
                return redirect()->route($validated['gateway'] . '.checkout');
            } else {
                $notify[] = ['error', 'Gateway does not exist.'];
                return back()->withNotify($notify);
            }
        } catch (\Exception $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    public function success($id)
    {
        try {
            // Enroll student into course
            $course = Course::find($id);
            $course->users()->attach(auth()->user()->id);
            $course = $course->users()->wherePivot('user_id', auth()->user()->id)->first()->pivot;
            $course->status = 2;
            $course->save();

            $notify[] = ['success', 'Payment successfull, you can now access the course...'];
            return redirect()->route('courses.enrolled')->withNotify($notify);
        } catch (\Exception $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    public function cancel()
    {
        $notify[] = ['warning', 'Your payment was cancelled...'];
        return redirect()->route('courses.explore')->withNotify($notify);
    }
}
