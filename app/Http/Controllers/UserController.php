<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all users
        $users = User::all();

        return response()->json(['users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Return the specific user
        return response()->json(['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required|string|in:admin,writer',
            // Add other validation rules as needed
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            // Add other fields as needed
        ]);
    
        return response()->json(['user' => $user], 201);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // Find the user by ID or throw an exception if not found
            $user = User::findOrFail($id);
    
            // Update the user based on the request data
            $user->update($request->all());
    
            return response()->json(['user' => $user]);
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the user is not found
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            // Check if the user exists
            $existingUser = User::findOrFail($user->id);
    
            // Attempt to delete the user
            $existingUser->delete();
    
            return response()->json(['message' => 'User deleted successfully']);
        } catch (ModelNotFoundException $exception) {
            // Handle the case where the record is not found (already deleted)
            return response()->json(['message' => 'User not found or already deleted'], 404);
        }
    }
}
