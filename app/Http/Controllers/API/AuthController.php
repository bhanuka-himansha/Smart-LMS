<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class AuthController extends Controller
{
    public function login (Request $request) {
        if (RateLimiter::tooManyAttempts('api.guests', 5)) {
            return response()->json([
                'status' => 429,
                'message' => 'Too many requests. Retry in ' . RateLimiter::availableIn('api.guests') . ' seconds'
            ], 429, array(
                'X-RateLimit-Limit' => 5,
                'X-RateLimit-Remaining' => RateLimiter::retriesLeft('api.guests', 5)
            ));
        }
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!isset($user)) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Email and password does not match with our record.',
                ], 401);
            }

            if (!$user->status) {
                return response()->json([
                    'status' => 403,
                    'message' => 'This account do not have permissions or seems to be banned.',
                ], 403);
            }

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => 401,
                    'message' => 'Email and password does not match with our record.',
                ], 401);
            }

            $user->tokens()->delete();

            $token = $user->createToken($request->email);

            return response()->json([
                'status' => 200,
                'message' => 'Authentication was successful.',
                'access_token' => $token->plainTextToken,
                'token_type' => 'Bearer',
                'expiration' => config('sanctum.expiration')
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function logout (Request $request) {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Deauthentication was successful.',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function user () {
        $user = Auth::user();
        return response()->json([
            'status' => 200,
            'message' => 'User retrieved successfully.',
            'user' => $user,
        ], 200);
    }
}
