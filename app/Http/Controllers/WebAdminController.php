<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Technician;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class WebAdminController extends Controller
{
    // ==========================================
    // ASSIGN TECHNICIAN TO BOOKING
    // ==========================================

    public function assignTechnician(Request $request, $id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $validated = $request->validate([
            'technician_id' => [
                'required',
                'integer',
                'exists:technicians,id'
            ],
        ]);

        DB::transaction(function () use ($validated, $id) {

            $booking = Booking::whereKey($id)
                ->lockForUpdate()
                ->firstOrFail();

            if (in_array($booking->status, ['completed', 'cancelled'])) {
                throw ValidationException::withMessages([
                    'booking' => 'Cannot assign a completed or cancelled booking.',
                ]);
            }

            $technician = Technician::whereKey(
                $validated['technician_id']
            )
                ->where('is_available', true)
                ->where('is_verified', true)
                ->first();

            if (!$technician) {
                throw ValidationException::withMessages([
                    'technician_id' => 'Selected technician is unavailable or not verified.',
                ]);
            }

            $activeAssignment = Assignment::where(
                'booking_id',
                $booking->id
            )
                ->whereIn('status', [
                    'pending',
                    'accepted',
                    'in_progress'
                ])
                ->exists();

            if ($activeAssignment) {
                throw ValidationException::withMessages([
                    'booking' => 'This booking already has an active technician assignment.',
                ]);
            }

            Assignment::create([
                'booking_id' => $booking->id,
                'technician_id' => $technician->id,
                'assigned_by' => auth()->id(),
                'status' => 'pending',
                'estimated_cost' => $booking->estimated_cost,
                'assigned_at' => now(),
            ]);

            $booking->update([
                'status' => 'assigned'
            ]);
        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'Technician assigned successfully!');
    }


    // ==========================================
    // CREATE TECHNICIAN ACCOUNT
    // ==========================================

    public function storeTechnician(Request $request)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email'
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],

            'specialization' => [
                'required',
                Rule::in([
                    'AC Repair',
                    'Refrigerator Repair',
                    'Washing Machine Repair',
                    'Electrical Repair',
                    'Plumbing Repair'
                ])
            ],

            'experience_years' => [
                'required',
                'integer',
                'min:0',
                'max:60'
            ],

            'phone' => [
                'nullable',
                'string',
                'max:20'
            ],

            'address' => [
                'nullable',
                'string',
                'max:500'
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'technician',
            ]);

            Technician::create([
                'user_id' => $user->id,
                'specialization' => $validated['specialization'],
                'experience_years' => $validated['experience_years'],
                'phone' => $validated['phone'] ?? null,
                'address' => $validated['address'] ?? null,
                'is_available' => true,
                'is_verified' => false,
            ]);
        });

        return redirect()
            ->route('dashboard')
            ->with('success', 'Technician account created successfully! Please verify the technician.');
    }


    // ==========================================
    // VERIFY / UNVERIFY TECHNICIAN
    // ==========================================

    public function toggleVerification($id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $technician = Technician::findOrFail($id);

        $technician->update([
            'is_verified' => !$technician->is_verified
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Technician verification updated successfully!');
    }


    // ==========================================
    // CHANGE TECHNICIAN AVAILABILITY
    // ==========================================

    public function toggleAvailability($id)
    {
        abort_unless(auth()->user()->role === 'admin', 403);

        $technician = Technician::findOrFail($id);

        $technician->update([
            'is_available' => !$technician->is_available
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'Technician availability updated successfully!');
    }
}
