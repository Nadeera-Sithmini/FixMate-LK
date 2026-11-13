<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // Create a payment for a completed booking
    public function store(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'payment_method' => 'required|in:cash,bank_transfer,card,online',
            'transaction_id' => 'nullable|string|max:255',
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
                'message' => 'Payment is only available for completed bookings.',
            ], 422);
        }

        if ($booking->estimated_cost === null ||
            (float) $booking->estimated_cost <= 0) {
            return response()->json([
                'success' => false,
                'message' => 'Valid booking amount is not available.',
            ], 422);
        }

        $existingPayment = Payment::where('booking_id', $booking->id)
            ->whereIn('status', ['pending', 'paid'])
            ->first();

        if ($existingPayment) {
            return response()->json([
                'success' => false,
                'message' => 'A pending or completed payment already exists for this booking.',
            ], 422);
        }

        $payment = Payment::create([
            'booking_id' => $booking->id,
            'user_id' => $request->user()->id,
            'amount' => $booking->estimated_cost,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'transaction_id' => $validated['transaction_id'] ?? null,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Payment created successfully. Payment is pending.',
            'payment' => $payment,
        ], 201);
    }

    // View logged-in customer's payments
    public function index(Request $request)
    {
        $payments = Payment::where('user_id', $request->user()->id)
            ->with('booking.service')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Payments retrieved successfully.',
            'payments' => $payments,
        ], 200);
    }

    // View a specific payment
    public function show(Request $request, $id)
    {
        $payment = Payment::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->with('booking.service')
            ->first();

        if (!$payment) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment retrieved successfully.',
            'payment' => $payment,
        ], 200);
    }
}
