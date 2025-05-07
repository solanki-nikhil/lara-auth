<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use App\Http\Middleware\TestUser;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login','login')->name('login');
Route::view('/register','register')->name('register');
Route::post('/registersave',[UserController::class,'register'])->name('registersave');
Route::post('/loginmatch',[UserController::class,'login'])->name('loginmatch');
// Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard')->middleware('IsUserValid',TestUser::class);  
// Route::get('/innerpage',[UserController::class,'innerpage'])->name('innerpage')->middleware('IsUserValid');


Route::middleware(['IsUserValid',TestUser::class])->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');  
    Route::get('/innerpage',[UserController::class,'innerpage'])->name('innerpage')->withoutMiddleware([TestUser::class]);
});
Route::get('/logout',[UserController::class,'logout'])->name('logout');

    