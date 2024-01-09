<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Enums\BlogEnums;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin-panel.login');
        }
    
        if ($request->isMethod('post')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $credentials = $request->only('email', 'password');
    
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $this->createToken($user);
                return response()->json(['token' => $token], 200);
            }
    
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
    

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout successful']);
    }

    private function createToken(User $user)
    {
        $permissions = $this->getPermissions($user);
        return $user->createToken('api-token', $permissions)->plainTextToken;
    }

    private function getPermissions(User $user)
    {
        return $user->role === BlogEnums::ADMIN ? [BlogEnums::ALL_PERMISSIONS] : [BlogEnums::LIMITED_PERMISSIONS];
    }
}

