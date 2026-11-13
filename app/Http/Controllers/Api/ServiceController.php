<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    // Get all active services
    public function index()
    {
        $services = Service::where('is_active', true)
            ->orderBy('id', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Services retrieved successfully!',
            'services' => $services,
        ], 200);
    }

    // Get one service
    public function show($id)
    {
        $service = Service::where('is_active', true)
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Service details retrieved successfully!',
            'service' => $service,
        ], 200);
    }
}
