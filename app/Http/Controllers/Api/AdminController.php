<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Check whether the logged-in user is an admin
    private function isAdmin(Request $request): bool
    {
        return $request->user()->role === 'admin';
    }

    // View all users
    public function users(Request $request)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $users = User::select(
            'id',
            'name',
            'email',
            'role',
            'created_at'
        )->latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'Users retrieved successfully!',
            'users' => $users,
        ], 200);
    }

    // View one user
    public function showUser(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $user = User::select(
            'id',
            'name',
            'email',
            'role',
            'created_at'
        )->find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'User details retrieved successfully!',
            'user' => $user,
        ], 200);
    }

    // Update a user's role
    public function updateUserRole(Request $request, $id)
    {
        if (!$this->isAdmin($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Access denied. Admin only.',
            ], 403);
        }

        $validated = $request->validate([
            'role' => 'required|in:customer,technician,admin',
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found.',
            ], 404);
        }

        $user->update([
            'role' => $validated['role'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User role updated successfully!',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
        ], 200);
    }
}
