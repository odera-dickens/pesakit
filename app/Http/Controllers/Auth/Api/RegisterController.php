<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['success' => false,'errors'=>$validator->errors()->all()], 400);
        }else{
            $data = array(
                'name' => $request['name'],
                'email' => $request['email'],
                'phone' => $request['phone'],
                'password' => Hash::make($request['password'])
            );
            if($newUser = User::create($data))
            {
                $token = $newUser->createToken('authToken')->accessToken;
                return response()->json(['success' => true, 'message' => 'You have been successfully registered', 'data' => $newUser,'access_token' => $token], 201);
            }else{
                return response()->json(['success' => false, 'error' => 'Failed to register'], 500);
            }
        }

    }
}
