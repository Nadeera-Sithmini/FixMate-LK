<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    // Check whether logged-in user is an admin
    private function isAdmin(Request $request): bool
    {
        return $request->user()->role === 'admin';
    }

    // View all services (including inactive services)
    public function index(Request $request)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $services = Service::orderBy('id', 'asc')->get();

        return response()->json([
            'success' => true,
            'message' => 'Services retrieved successfully!',
            'services' => $services,
        ], 200);
    }

    // Add a new service
    public function store(Request $request)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'required|numeric|min:0',
            'estimated_duration' => 'required|integer|min:1',
            'image' => 'nullable|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        $service = Service::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully!',
            'service' => $service,
        ], 201);
    }

    // Update an existing service
    public function update(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:services,slug,' . $id,
            'category' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'base_price' => 'sometimes|required|numeric|min:0',
            'estimated_duration' => 'sometimes|required|integer|min:1',
            'image' => 'nullable|string|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        $service->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!',
            'service' => $service,
        ], 200);
    }

    // Delete an existing service
    public function destroy(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'success' => false,
                'message' => 'Service not found.',
            ], 404);
        }

        try {
            $service->delete();

            return response()->json([
                'success' => true,
                'message' => 'Service deleted successfully!',
            ], 200);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'This service cannot be deleted because it is linked to existing bookings.',
            ], 409);
        }
    }

}
