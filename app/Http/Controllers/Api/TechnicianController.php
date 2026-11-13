<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    // View logged-in technician's assigned jobs
    public function myJobs(Request $request)
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

        $assignments = $technician->assignments()
            ->with('booking.service')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Assigned jobs retrieved successfully!',
            'jobs' => $assignments,
        ], 200);
    }
}
