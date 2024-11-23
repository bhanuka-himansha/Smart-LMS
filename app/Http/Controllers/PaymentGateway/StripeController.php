<?php

namespace App\Http\Controllers\PaymentGateway;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function __invoke(Request $request)
    {
        try {
            $course_id = Session::get('course_id');
            $course = Course::find($course_id);
            $total = $course->amount - $course->discount;

            \Stripe\Stripe::setApiKey(config('stripe.sk'));

            $session = \Stripe\Checkout\Session::create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $course->name,
                        ],
                        'unit_amount' => $total,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payment.success', ['course_id' => $course_id]),
                'cancel_url' => route('payment.cancelled'),
            ]);

            return redirect()->away($session->url);
        } catch (\Exception $e) {
            $notify[] = ['error', $e->getMessage()];
            return redirect()->route('courses.explore')->withNotify($notify);
        }
    }
}
