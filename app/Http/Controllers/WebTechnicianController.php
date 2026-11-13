<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Technician;
use Illuminate\Http\Request;

class WebTechnicianController extends Controller
{
    private function getTechnician()
    {
        $technician = Technician::where(
            'user_id',
            auth()->id()
        )->first();

        abort_unless($technician, 403, 'Technician profile not found.');

        return $technician;
    }

    // Accept assigned job
    public function accept($id)
    {
        $technician = $this->getTechnician();

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->firstOrFail();

        if ($assignment->status !== 'pending') {
            return back()->with('error', 'This job cannot be accepted.');
        }

        $assignment->update([
            'status' => 'accepted',
            'accepted_at' => now(),
        ]);

        $assignment->booking()->update([
            'status' => 'confirmed',
        ]);

        return back()->with('success', 'Job accepted successfully!');
    }

    // Reject assigned job
    public function reject($id)
    {
        $technician = $this->getTechnician();

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->firstOrFail();

        if ($assignment->status !== 'pending') {
            return back()->with('error', 'This job cannot be rejected.');
        }

        $assignment->update([
            'status' => 'rejected',
        ]);

        $assignment->booking()->update([
            'status' => 'confirmed',
        ]);

        return back()->with('success', 'Job rejected successfully!');
    }

    // Update job status
    public function updateStatus(Request $request, $id)
    {
        $technician = $this->getTechnician();

        $validated = $request->validate([
            'status' => 'required|in:in_progress,completed',
            'notes' => 'nullable|string',
            'final_cost' => 'nullable|numeric|min:0',
        ]);

        $assignment = Assignment::where('technician_id', $technician->id)
            ->where('id', $id)
            ->firstOrFail();

        if (
            ($validated['status'] === 'in_progress' && $assignment->status !== 'accepted') ||
            ($validated['status'] === 'completed' && $assignment->status !== 'in_progress')
        ) {
            return back()->with('error', 'Invalid job status transition.');
        }

        $assignment->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $assignment->notes,
            'final_cost' => $validated['final_cost'] ?? $assignment->final_cost,
            'completed_at' => $validated['status'] === 'completed' ? now() : null,
        ]);

        $assignment->booking()->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'Job status updated successfully!');
    }
}
