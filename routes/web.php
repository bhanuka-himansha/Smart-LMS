<?php

use App\Http\Controllers\Document\IndexController;
use App\Http\Controllers\Integrations\ZoomController;
use App\Http\Controllers\PaymentGateway\PaymentController;
use App\Http\Controllers\PaymentGateway\PaypalController;
use App\Http\Controllers\PaymentGateway\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProgressController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Welcome
Route::get('/', function () {
    return redirect()->route('login');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profileupdate', [ProfileController::class, 'updateDetails'])->name('profile.details.update');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Student Dashboard
    Route::get('/dashboard', DashboardController::class)->name('student.dashboard');

    // Courses
    Route::get('/course/explore', [CourseController::class, 'explore'])->name('courses.explore');
    Route::get('/course/enrolled', [CourseController::class, 'enrolled'])->name('courses.enrolled');
    Route::get('/course/{course}/{content:slug?}', [CourseController::class, 'index'])->name('course.view');
    // Route::post('/course-rating', [CourseController::class, 'courseRating'])->name('course.rating');
    Route::get('/search-courses', [CourseController::class, 'search'])->name('course.search');

    // Enrollments
    Route::get('/enroll/{id?}', [StudentController::class, 'enrollStudent'])->name('student.enroll');

    // Progression
    Route::get('/progress/lesson/{id?}', [ProgressController::class, 'completeLesson'])->name('lesson.complete');
    Route::get('/progress/course/{id?}', [ProgressController::class, 'completeCourse'])->name('course.complete');

    // Payments
    Route::post('/payment/initiate', [PaymentController::class, 'initiate'])->name('payment.initiate');
    Route::get('/payment/success/{id?}', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/cancelled', [PaymentController::class, 'cancel'])->name('payment.cancelled');

    // Stripe Gateway
    Route::get('/stripe/checkout', StripeController::class)->name('stripe.checkout');

    // Paypal Gateway
    Route::get('/paypal/checkout', PaypalController::class)->name('paypal.checkout');

    // Zoom Integration
    Route::get('/zoom', [ZoomController::class, 'index'])->name('zoom.index');
    // Route::get('/zoom-details', [CourseController::class, 'zoomMeetings'])->name('course.zoom-details');
    Route::get('/{courseSlug}/zoom-details', [CourseController::class, 'zoomMeetings'])->name('course.zoom-details');

    // Documents
    Route::get('/documents', IndexController::class)->name('document.index');
});

require __DIR__ . '/auth.php';
