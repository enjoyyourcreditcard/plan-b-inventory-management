<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handleLogin($request)
    {
        $credentials = request(['email', 'password']);
        $credentials = Arr::add($credentials, 'status', 'aktif');
        if (!Auth::attempt($credentials)) {
            return ResponseJSON("Email Atau Password Anda salah",  401);
        }
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception('Error in Login');
        }
        // $tokenResult = $user->createToken('token-auth', ['server:update'])->plainTextToken;
        $request->session()->regenerate();
        $request->session()->get('token', $user->createToken('token-auth', ['show-part'])->plainTextToken);
        
        return ResponseJSON([
            'user' => $user,
            // 'access_token' => $tokenResult,
        ],  200);
    }

    public function handleLogout($request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return "Logout successfully";
    }
    public function handleLogoutAll($request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return "Logout successfully";
    }
}
