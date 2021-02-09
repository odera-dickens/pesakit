<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function getUsers()
    {
        //only show users with the role as 'user'
        $users = User::get()->filter(function($user){ 
            return $user->role == 'user';
         });
        return view('admin.users.index', compact('users', $users));
    }
    public function getUser(User $user)
    {
        return view('admin.users.profile',compact('user',$user));
    }
}
