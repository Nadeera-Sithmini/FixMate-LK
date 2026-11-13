<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Technician;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    // Accept an assigned job
    public function accept(Request $request, $id)
    {
        $technician = Technician::where(
            'user_id',
            $request->user()->id
        )->first();

        if (!$technician) {
            return response()->json([
                'success' => false,
                'message' => 'Technician profile not found.',
            ], 404);
        }

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->first();

        if (!$assignment) {
            return response()->json([
                'success' => false,
                'message' => 'Assignment not found.',
            ], 404);
        }

        if ($assignment->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'This assignment cannot be accepted.',
            ], 422);
        }

        $assignment->update([
            'status' => 'accepted',
            'accepted_at' => now(),
        ]);

        $assignment->booking()->update([
            'status' => 'confirmed',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job accepted successfully!',
            'assignment' => $assignment->load('booking.service'),
        ], 200);
    }


    // Reject an assigned job
    public function reject(Request $request, $id)
    {
        $technician = Technician::where(
            'user_id',
            $request->user()->id
        )->first();

        if (!$technician) {
            return response()->json([
                'success' => false,
                'message' => 'Technician profile not found.',
            ], 404);
        }

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->first();

        if (!$assignment) {
            return response()->json([
                'success' => false,
                'message' => 'Assignment not found.',
            ], 404);
        }

        if ($assignment->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'This assignment cannot be rejected.',
            ], 422);
        }

        $assignment->update([
            'status' => 'rejected',
        ]);

        $assignment->booking()->update([
            'status' => 'confirmed',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job rejected successfully!',
            'assignment' => $assignment,
        ], 200);
    }


    // Update job status
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:in_progress,completed',
            'notes' => 'nullable|string',
            'final_cost' => 'nullable|numeric|min:0',
        ]);

        $technician = Technician::where(
            'user_id',
            $request->user()->id
        )->first();

        if (!$technician) {
            return response()->json([
                'success' => false,
                'message' => 'Technician profile not found.',
            ], 404);
        }

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->first();

        if (!$assignment) {
            return response()->json([
                'success' => false,
                'message' => 'Assignment not found.',
            ], 404);
        }

        // Validate status transition
        if (
            ($validated['status'] === 'in_progress' && $assignment->status !== 'accepted') ||
            ($validated['status'] === 'completed' && $assignment->status !== 'in_progress')
        ) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid job status transition.',
            ], 422);
        }

        $assignment->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $assignment->notes,
            'final_cost' => $validated['final_cost'] ?? $assignment->final_cost,
            'completed_at' => $validated['status'] === 'completed'
                ? now()
                : null,
        ]);

        $assignment->booking()->update([
            'status' => $validated['status'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job status updated successfully!',
            'assignment' => $assignment->load('booking.service'),
        ], 200);
    }
}
