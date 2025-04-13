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
        
    }

    public function login(Request $request)
    {
        // if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response()->json([
        //         "message" => "Invalid Credintails"
        //     ], 403);
        // }

        // $token = $user->createToken("auth_token")->plainTextToken;
        // $token = $user->createToken('auth_token', ['*'], now()->addDays(30));

        
    }


    public function logout(Request $request)
    {
        // $request->user()->tokens()->delete(); // Revoke all tokens
    }

    // Authenticated User
    public function profile(Request $request)
    {
        
    }
}
