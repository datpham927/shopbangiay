<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function handleGoogleCallback(Request $request)
    {
        try {
            $authUser = $request->only(['email']);

            $user = User::where('email', $authUser["email"])->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => "User not found.",
                ], 404);
            } else {
                return response()->json([
                    'status' => true,
                    'message' => 'User login successfully.',
                    'token' => $user->createToken("API TOKEN")->plainTextToken,
                    'user' => $user,
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
