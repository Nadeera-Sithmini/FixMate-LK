<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebBookingController;
use App\Http\Controllers\WebTechnicianController;
use App\Http\Controllers\WebAdminController;

use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Technician;
use App\Models\Assignment;


// ==========================================
// HOME PAGE
// ==========================================

Route::get('/', function () {
    return view('pages.home');
});


// ==========================================
// GUEST ROUTES
// ==========================================

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');


    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');

});


// ==========================================
// AUTHENTICATED ROUTES
// ==========================================

Route::middleware('auth')->group(function () {


    // ======================================
    // MAIN DASHBOARD
    // ======================================

    Route::get('/dashboard', function () {

        $user = auth()->user();


        // ==================================
        // ADMIN DASHBOARD
        // ==================================

        if ($user->role === 'admin') {

            // Dashboard Statistics
            $totalUsers = User::count();

            $totalServices = Service::count();

            $totalBookings = Booking::count();

            $pendingBookings = Booking::where(
                'status',
                'pending'
            )->count();


            // Recent Bookings
            $recentBookings = Booking::with([
                'user',
                'service'
            ])
                ->latest()
                ->take(5)
                ->get();


            // All Bookings
            $bookings = Booking::with([
                'user',
                'service'
            ])
                ->latest()
                ->get();


            // ALL Technicians (For Admin Management)
            $allTechnicians = Technician::with('user')
                ->latest()
                ->get();


            // Available and Verified Technicians
            // Used for Booking Assignment
            $technicians = Technician::with('user')
                ->where('is_available', true)
                ->where('is_verified', true)
                ->get();


            // Active Assignments
            $activeAssignments = Assignment::with([
                'technician.user'
            ])
                ->whereIn('booking_id', $bookings->pluck('id'))
                ->whereIn('status', [
                    'pending',
                    'accepted',
                    'in_progress'
                ])
                ->get()
                ->keyBy('booking_id');


            // Return Admin Dashboard
            return view('pages.admin-dashboard', compact(
                'user',
                'totalUsers',
                'totalServices',
                'totalBookings',
                'pendingBookings',
                'recentBookings',
                'bookings',
                'technicians',
                'allTechnicians',
                'activeAssignments'
            ));
        }


        // ==================================
        // CUSTOMER DASHBOARD
        // ==================================

        if ($user->role === 'customer') {

            // Customer Bookings
            $bookings = Booking::with('service')
                ->where('user_id', $user->id)
                ->latest()
                ->get();


            // Booking Statistics
            $totalBookings = $bookings->count();

            $pendingBookings = $bookings
                ->where('status', 'pending')
                ->count();

            $completedBookings = $bookings
                ->where('status', 'completed')
                ->count();


            // Active Services
            $services = Service::where('is_active', true)
                ->orderBy('id')
                ->get();


            // Return Customer Dashboard
            return view('pages.dashboard', compact(
                'user',
                'bookings',
                'totalBookings',
                'pendingBookings',
                'completedBookings',
                'services'
            ));
        }


        // ==================================
        // TECHNICIAN DASHBOARD
        // ==================================

        if ($user->role === 'technician') {

            // Find Technician Profile
            $technician = Technician::where(
                'user_id',
                $user->id
            )->first();


            if (!$technician) {
                abort(403, 'Technician profile not found.');
            }


            // Technician Assignments
            $assignments = $technician->assignments()
                ->with([
                    'booking.user',
                    'booking.service'
                ])
                ->latest()
                ->get();


            // Job Statistics
            $totalJobs = $assignments->count();

            $pendingJobs = $assignments
                ->where('status', 'pending')
                ->count();

            $completedJobs = $assignments
                ->where('status', 'completed')
                ->count();


            // Return Technician Dashboard
            return view('pages.technician-dashboard', compact(
                'user',
                'technician',
                'assignments',
                'totalJobs',
                'pendingJobs',
                'completedJobs'
            ));
        }


        // ==================================
        // UNAUTHORIZED ROLE
        // ==================================

        abort(403, 'Dashboard not available for this account.');

    })->name('dashboard');


    // ======================================
    // ADMIN TECHNICIAN MANAGEMENT
    // ======================================

    // Assign Technician to Booking
    Route::post(
        '/admin/bookings/{id}/assign',
        [WebAdminController::class, 'assignTechnician']
    )->name('admin.bookings.assign');


    // Create Technician Account
    Route::post(
        '/admin/technicians',
        [WebAdminController::class, 'storeTechnician']
    )->name('admin.technicians.store');


    // Verify / Unverify Technician
    Route::patch(
        '/admin/technicians/{id}/verification',
        [WebAdminController::class, 'toggleVerification']
    )->name('admin.technicians.verification');


    // Available / Unavailable Technician
    Route::patch(
        '/admin/technicians/{id}/availability',
        [WebAdminController::class, 'toggleAvailability']
    )->name('admin.technicians.availability');


    // ======================================
    // TECHNICIAN JOB MANAGEMENT
    // ======================================

    Route::post(
        '/technician/assignments/{id}/accept',
        [WebTechnicianController::class, 'accept']
    )->name('technician.assignments.accept');


    Route::post(
        '/technician/assignments/{id}/reject',
        [WebTechnicianController::class, 'reject']
    )->name('technician.assignments.reject');


    Route::post(
        '/technician/assignments/{id}/status',
        [WebTechnicianController::class, 'updateStatus']
    )->name('technician.assignments.status');


    // ======================================
    // CUSTOMER BOOKING
    // ======================================

    Route::post(
        '/bookings',
        [WebBookingController::class, 'store']
    )->name('bookings.store');


    // ======================================
    // LOGOUT
    // ======================================

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    )->name('logout');

});
