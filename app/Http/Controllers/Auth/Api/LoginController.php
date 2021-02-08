<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        /*
        if(Auth::attempt(['email'=> $request['email'],'password' => $request['password']]))
        {
            $user = Auth::user();
            $token = $user->createToken('authToken')->accessToken;
            return response()->json(['success'=> true, 'message'=>'You have successfully logged in','access_token' => $token], 200);
        }else{
            return response()->json(['success'=> false, 'message'=>'Failed to login'], 500);
        }
        **/
        //handle validation
        $validator = Validator::make($request->all(), array(
            'email' => 'required|string|email|max:255',
            'password' => 'required'
        ));
        if($validator->fails())
        {
            return response(['errors'=> $validator->errors()->all()], 422);
        }
        $user = User::where('email','=',$request->email)->first();
        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $token = $user->createToken('access_token')->accessToken;
                return response(['token' => $token],200 );
            }else{
                return response(['message' => 'Invalid password'], 422);
            }
        }else{
            return response(['message' => 'User does not exist', 422]);
        }
    }
    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        return response(['message' => 'You have been successfully logged out'], 200);
    }
}
