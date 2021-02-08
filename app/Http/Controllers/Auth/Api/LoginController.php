<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middeware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=> $request['email'],'password' => $request['password']]))
        {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['success'=> true, 'message'=>'You have successfully logged in'], 200);
        }else{
            return response()->json(['success'=> false, 'message'=>'Failed to login'], 500);
        }
    }
}
