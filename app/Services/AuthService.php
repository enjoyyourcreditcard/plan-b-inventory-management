<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    // protected $maxAttempts = 2; // Default is 5
    // protected $decayMinutes = 0.5; // Default is 1

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handleLogin($request)
    {
        // dd($request->loginPage == "pageLogin");
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:5'
        // ]);

        // if ($validator->fails()) {
            
            $credentials = request(['email', 'password']);
            $credentials = Arr::add($credentials, 'status', 'active');
            if (!Auth::attempt($credentials)) {
                return ResponseJSON("Email Atau Password Anda salah",  401);
            }
    
            $user = User::where('email', $request->email)->first();
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Error in Login');
            }
    
            $permission_user = UserPermission::where('user_id',$user->id)->with('permission')->get()->map(function ($item)
            {
                return $item->permission->name;
            })->toArray();
            
            $request->session()->regenerate(); 
            $request->session()->get('token', $user->createToken('token-auth', $permission_user)->plainTextToken);
           
            return ResponseJSON([
                'user' => $user,
                // 'access_token' => $tokenResult,
            ],  200);
        //     return ResponseJSON($validator->errors(), 422);
        // }
        // if (!$token=auth()->attempt($validator->validated())) {
        //     return ResponseJSON(['error'=>'Unauthorized'], 401);
        // }
        // return $this->createNewToken($token);
    }

    
    // Login Api JWT
    // public function handleApiLogin($request){
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|string|min:5'
    //     ]);

    //     if ($validator->fails()) {
    //         return ResponseJSON($validator->errors(), 422);
    //     }

    //     if (!$token=auth()->attempt($validator->validated())) {
    //         return ResponseJSON(['error'=>'Unauthorized'], 401);
    //     }

    //     return $this->createNewToken($token);
    // }
    // JWT
    // public function createNewToken($token){
    //     return ResponseJSON([
    //         'acces_token'=>$token,
    //         'token_type'=>'bearer',
    //         'expires_in'=>null,
    //         'user'=>auth()->user()
    //     ]);
    public function handleLogout($request)
    {
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return "Logout successfully";
    }
    public function handleLogoutAll($request)
    {
        Auth::logout();
        // $request->session()->invalidate();
        // $request->seasion()->regenerateToken();
        return "Logout successfully";
    }
    }


    

