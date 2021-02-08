<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middeware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        
    }
}
