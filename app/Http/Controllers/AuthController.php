<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // protected $maxAttempts = 3; // Default is 5
    // protected $decayMinutes = 2; // Default is 1


    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        // $this->authService->handleLogin($request)
        // if ($request->loginPage == "pageLogin") {
        //     $token = $this->authService->handleLogin($request);
        //     return view('home', [
        //         'token' => $token->getData()->data->acces_token
        //     ]);
        // }
        $login = $this->authService->handleLogin($request);
        return view('home', [
            'login' => $login,
        ]);
        // dd(Auth::user());
        // return redirect('/part');

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
       $this->authService->handleLogoutAll($request);
        // $respon = [
        //     'status' => 'success',
        //     'msg' => 'Logout successfully',
        //     'data' => $result,
        // ];

        return redirect('/login');

        // return response()->json($respon, 200);
    }
}
