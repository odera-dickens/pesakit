<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User\Api\ProfileResource;
use App\Models\User;

class ProfileController extends Controller
{
    public function getProfile()
    {
        if(!Auth::guard('api')->check())
        {
            return response(['error' => 'Unauthorized'], 403);
        }
        return new ProfileResource(Auth::user());
    }
}
