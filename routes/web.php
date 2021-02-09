<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//admin routes
Route::group(['middleware'=> 'admin','prefix'=>'admin','as' => 'admin.'], function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/users/{user}',[AdminController::class,'index'])->name('user.profile');
});