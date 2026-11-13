<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBookingController extends Controller
{
    // Check admin access
    private function isAdmin(Request $request): bool
    {
        return $request->user()->role === 'admin';
    }

    // View all bookings
    public function index(Request $request)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $bookings = Booking::with(['user', 'service'])
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'All bookings retrieved successfully!',
            'bookings' => $bookings,
        ], 200);
    }

    // View one booking
    public function show(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $booking = Booking::with(['user', 'service'])->find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking details retrieved successfully!',
            'booking' => $booking,
        ], 200);
    }

    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $validated = $request->validate([
            'status' => [
                'required',
                Rule::in([
                    'pending',
                    'confirmed',
                    'assigned',
                    'in_progress',
                    'completed',
                    'cancelled',
                ]),
            ],
        ]);

        $booking = Booking::find($id);

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found.',
            ], 404);
        }

        $booking->status = $validated['status'];
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking status updated successfully!',
            'booking' => $booking->load(['user', 'service']),
        ], 200);
    }
}
