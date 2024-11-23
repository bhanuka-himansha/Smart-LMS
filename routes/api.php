<?php

use App\Http\Controllers\API\AnalyticsController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['throttle:api.guests'])->group(function () {
    // Auth Routes
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
});

// Authenticated Routes
Route::middleware(['auth:sanctum', 'throttle:api.users'])->group(function () {
    // User Details
    Route::get('/user', [AuthController::class, 'user'])->name('api.user');
    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    // Explore Courses
    Route::get('/course/explore', [CourseController::class, 'explore'])->name('api.courses.explore');
    // Enrolled Courses
    Route::get('/course/enrolled', [CourseController::class, 'enrolled'])->name('api.courses.enrolled');
    // Analytics
    Route::get('/analytics/global', [AnalyticsController::class, 'globalAnalytics'])->name('api.analytics.global');
    Route::get('/analytics/course', [AnalyticsController::class, 'courseAnalytics'])->name('api.analytics.course');
    // Search Courses
    Route::get('/search-courses', [CourseController::class, 'search'])->name('api.search');
    Route::post('/course-rating', [App\Http\Controllers\Student\CourseController::class, 'courseRating'])->name('course.rating');

    Route::get('/course/{course}/reviews', [App\Http\Controllers\Student\CourseController::class, 'fetchReviews'])->name('reviews.fetch');


});


