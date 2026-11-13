<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\TechnicianController;
use App\Http\Controllers\Api\AssignmentController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AdminServiceController;
use App\Http\Controllers\Api\AdminBookingController;
use App\Http\Controllers\Api\PaymentController;

// Public API Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::get('/reviews', [ReviewController::class, 'index']);

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/bookings/{id}', [BookingController::class, 'show']);
    Route::put('/bookings/{id}', [BookingController::class, 'update']);
    Route::patch('/bookings/{id}/cancel', [BookingController::class, 'cancel']);
    Route::get('/technician/jobs', [TechnicianController::class, 'myJobs']);
    // Technician Assignment Routes
    Route::patch('/technician/assignments/{id}/accept', [AssignmentController::class, 'accept']);
    Route::patch('/technician/assignments/{id}/reject', [AssignmentController::class, 'reject']);
    // Update Technician Job Status
Route::patch('/technician/assignments/{id}/status', [AssignmentController::class, 'updateStatus']);
// Review Routes
Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/bookings/{id}/review', [ReviewController::class, 'showBookingReview']);
// Admin User Management Routes
Route::get('/admin/users', [AdminController::class, 'users']);

Route::get('/admin/users/{id}', [AdminController::class, 'showUser']);

Route::patch('/admin/users/{id}/role', [AdminController::class, 'updateUserRole']);

// Admin Service Management
Route::get('/admin/services', [AdminServiceController::class, 'index']);
Route::post('/admin/services', [AdminServiceController::class, 'store']);
Route::put('/admin/services/{id}', [AdminServiceController::class, 'update']);
Route::delete('/admin/services/{id}', [AdminServiceController::class, 'destroy']);

// Admin Booking Management
Route::get('/admin/bookings', [AdminBookingController::class, 'index']);
Route::get('/admin/bookings/{id}', [AdminBookingController::class, 'show']);
Route::patch('/admin/bookings/{id}/status', [AdminBookingController::class, 'updateStatus']);
// Payment Routes
Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/{id}', [PaymentController::class, 'show']);

    Route::get('/user', function (Request $request) {
        return response()->json([
            'success' => true,
            'user' => $request->user(),
        ]);
    });
});
