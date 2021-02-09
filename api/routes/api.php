<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Api\RegisterController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\User\Api\ProfileController;

//protect API routes with the cors and json middlewares
Route::group(['middleware'=>['cors','json']], function(){
    Route::group(['prefix'=>'/v1/user','as'=>'user.api.'], function(){
        Route::post('/register',[RegisterController::class,'register'])->name('register');
        Route::post('/login',[LoginController::class,'login'])->name('login');
        //requires authentication
        Route::group(['middleware'=> 'auth:api'], function(){
            Route::post('/logout',[LoginController::class,'logout'])->name('logout');
            Route::get('/profile',[ProfileController::class,'getProfile'])->name('profile');
        });
    });
});
