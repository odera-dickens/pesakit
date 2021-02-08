<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\User\Api\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'/v1/user','as'=>'user.api.'], function(){
    Route::post('/register',[RegisterController::class,'register'])->name('register');
    Route::post('/login',[LoginController::class,'login'])->name('login');
    //protected routes with api middleware
    Route::group(['middleware'=> 'auth:api'], function(){
        Route::post('/logout',[LoginController::class,'logout'])->name('logout');
        Route::get('/profile',[ProfileController::class,'getProfile'])->name('profile');
    });
});
