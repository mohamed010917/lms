<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
            // Validate the incoming request
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);
    
            // Find the user by email
            $user = User::where('email', $request->email)->first();
    
            // Check if user exists and if the password matches
            if ($user && Hash::check($request->password, $user->password)) {
                // Create a token for the user
                $token = $user->createToken('lms')->plainTextToken;
    
                // Return the token
                return response()->json(['token' => $token], 200);
            }
    
            return response()->json(['message' => 'Invalid credentials'], 401);
    }

public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json(['message' => 'Logged out successfully!'], 200);
}
public function me(Request $request)
{
   $user = $request->user() ;

    return response()->json(['user' => $user], 200);
}
}
