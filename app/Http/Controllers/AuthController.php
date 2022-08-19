<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{


    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->handleLogin($request);
    }


    public function logout(Request $request)
    {

        $result = $this->authService->handleLogout($request);
        return [
            'code' => 200,
            'msg' => 'Logout successfully',
            'data' => $result
        ];
    }

    public function logoutall(Request $request)
    {
        $result = $this->authService->handleLogoutAll($request);
        $respon = [
            'status' => 'success',
            'msg' => 'Logout successfully',
            'data' => $result,
        ];
        return response()->json($respon, 200);
    }
}