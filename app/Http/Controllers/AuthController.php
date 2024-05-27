<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = Auth::user()->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'me' => new UserResource(User::with('role')->find($user->id))
            ], 200);
        }

        return response()->json(['error' => 'Credentials incorrect'], 401);
    }

    public function logout(): JsonResponse
    {
        $user = Auth::user();

        if ($user) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Logout succesfully'], 200);
        } else {
            return response()->json(['error' => 'no user Auth', 401]);
        }
    }
}
