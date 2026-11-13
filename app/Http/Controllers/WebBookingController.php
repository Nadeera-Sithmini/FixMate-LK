<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;

class WebBookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'appliance_name' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
        ]);

        $service = Service::where('is_active', true)
            ->findOrFail($validated['service_id']);

        Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'appliance_name' => $validated['appliance_name'],
            'problem_description' => $validated['problem_description'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'phone' => $validated['phone'],
            'status' => 'pending',
            'estimated_cost' => $service->base_price,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Your service booking has been submitted successfully!');
    }
}
