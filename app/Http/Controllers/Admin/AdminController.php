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
        $users = User::all();
        $filteredUsers = $users->filter(function($user){
            return $user->role = 'user';
        });
        return view('admin.users.index', compact('users', $filteredUsers));
    }
    public function getUser(User $user)
    {
        return view('admin.users.profile',compact('user',$user));
    }
}