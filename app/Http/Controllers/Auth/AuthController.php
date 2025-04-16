<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 200 - 299 valid created ok
        // 300 - 399 not found        
        // 400 - 499 invalid duplicate 
        // 500 internal server error

        $request->validate([
            'name' => 'required|string|max:255',
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8",
            // "password_confirmation" => "required|string|min:8",
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json(
            [
                "message" => "User Created Successfully",
                "user" => $user,
            ],
            201
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|string|email|max:255",
            "password" => "required|string|min:8",
        ]);
        
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "message" => "Invalid Credintails"
            ], 403); //forbidden
        }

        // $token = $user->createToken("auth_token")->plainTextToken;
        $token = $user->createToken('auth_token', ['*'], now()->addDays(30));

        return response()->json([
            "message" => "Login Successfully",
            "user" => $user,
            "token" => $token,
        ], 200); //successful!
    }


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // Revoke all tokens
        return response()->json([
            "message" => "Logged out successfully"
        ], 200);
    }

    // Authenticated User
    public function profile(Request $request) {
        return response()->json([
            "message" => "User Profile",
            "user" => $request->user(),
        ], 200);
    }
}
