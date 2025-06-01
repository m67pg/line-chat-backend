<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ログイン処理
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    // ?? ログアウト処理（現在のトークンを削除）
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            // 現在のトークンのみ削除
            $user->currentAccessToken()->delete();

            // すべてのトークンを削除したい場合はこちら：
            // $user->tokens()->delete();

            return response()->json(['message' => 'Logged out successfully']);
        }

        return response()->json(['message' => 'User not authenticated'], 401);
    }
}
