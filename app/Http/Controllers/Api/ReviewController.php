<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Booking;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Submit a review for a completed booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ]);

        $booking = Booking::where('id', $validated['booking_id'])
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found.',
            ], 404);
        }

        if ($booking->status !== 'completed') {
            return response()->json([
                'success' => false,
                'message' => 'You can only review completed bookings.',
            ], 422);
        }

        if (Review::where('booking_id', $booking->id)->exists()) {
            return response()->json([
                'success' => false,
                'message' => 'This booking has already been reviewed.',
            ], 422);
        }

        $assignment = Assignment::where('booking_id', $booking->id)
            ->where('status', 'completed')
            ->first();

        if (!$assignment) {
            return response()->json([
                'success' => false,
                'message' => 'Completed technician assignment not found.',
            ], 404);
        }

        $review = Review::create([
            'user_id' => $request->user()->id,
            'booking_id' => $booking->id,
            'technician_id' => $assignment->technician_id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
            'is_visible' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted successfully!',
            'review' => $review,
        ], 201);
    }

    // View all visible reviews
    public function index()
    {
        $reviews = Review::where('is_visible', true)
            ->with([
                'user:id,name',
                'technician:id,user_id,specialization',
                'technician.user:id,name',
                'booking:id,service_id',
                'booking.service:id,name',
            ])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Reviews retrieved successfully!',
            'reviews' => $reviews,
        ], 200);
    }

    // View review for a specific booking
    public function showBookingReview(Request $request, $id)
    {
        $booking = Booking::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$booking) {
            return response()->json([
                'success' => false,
                'message' => 'Booking not found.',
            ], 404);
        }

        $review = Review::where('booking_id', $booking->id)
            ->where('is_visible', true)
            ->with([
                'user:id,name',
                'technician:id,user_id,specialization',
                'technician.user:id,name',
            ])
            ->first();

        if (!$review) {
            return response()->json([
                'success' => false,
                'message' => 'Review not found for this booking.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Booking review retrieved successfully!',
            'review' => $review,
        ], 200);
    }
}
