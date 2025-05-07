<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login','login')->name('login');
Route::view('/register','register')->name('register');
Route::post('/registersave',[UserController::class,'register'])->name('registersave');
Route::post('/loginmatch',[UserController::class,'login'])->name('loginmatch');
Route::get('/dashboard',[UserController::class,'dashboard'])->name('dashboard');
Route::get('/innerpage',[UserController::class,'innerpage'])->name('innerpage');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

    