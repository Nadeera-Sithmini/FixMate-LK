<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // View all bookings of logged-in customer
    public function index(Request $request)
    {
        $bookings = Booking::where('user_id', $request->user()->id)
            ->with('service')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'My bookings retrieved successfully!',
            'bookings' => $bookings,
        ], 200);
    }

    // View one booking belonging to logged-in customer
    public function show(Request $request, $id)
    {
        $booking = Booking::where('user_id', $request->user()->id)
            ->with('service')
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Booking details retrieved successfully!',
            'booking' => $booking,
        ], 200);
    }

    // Update an existing booking
    public function update(Request $request, $id)
    {
        $booking = Booking::where('user_id', $request->user()->id)
            ->findOrFail($id);

        if ($booking->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Only pending bookings can be updated.',
            ], 422);
        }

        $validated = $request->validate([
            'service_id' => 'sometimes|required|exists:services,id',
            'appliance_name' => 'sometimes|required|string|max:255',
            'problem_description' => 'sometimes|required|string',
            'booking_date' => 'sometimes|required|date|after_or_equal:today',
            'booking_time' => 'sometimes|required|date_format:H:i',
            'address' => 'sometimes|required|string|max:255',
            'city' => 'sometimes|required|string|max:255',
            'phone' => 'sometimes|required|string|max:20',
        ]);

        $booking->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Booking updated successfully!',
            'booking' => $booking->load('service'),
        ], 200);
    }

    // Cancel a booking
    public function cancel(Request $request, $id)
    {
        $booking = Booking::where('user_id', $request->user()->id)
            ->findOrFail($id);

        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return response()->json([
                'success' => false,
                'message' => 'This booking cannot be cancelled.',
            ], 422);
        }

        $booking->status = 'cancelled';
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Booking cancelled successfully!',
            'booking' => $booking,
        ], 200);
    }

    // Create a new booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'appliance_name' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $booking = Booking::create([
            'user_id' => $request->user()->id,
            'service_id' => $validated['service_id'],
            'appliance_name' => $validated['appliance_name'],
            'problem_description' => $validated['problem_description'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'phone' => $validated['phone'],
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Booking created successfully!',
            'booking' => $booking,
        ], 201);
    }
}
