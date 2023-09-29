<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShortController;
use App\Http\Controllers\UrlShrotnerController;
use Database\Seeders\UrlShrotnerSeeder;
use Illuminate\Support\Facades\Route;



Route::get('/',[AuthController::class,'register_view'])->name('register');
Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login')->middleware('throttle:2,1');
Route::post('register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,1');
Route::get('/short/{code}',[ShortController::class,'short'])->name('short');

Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
    Route::resource('url_shrotner',UrlShrotnerController::class);

});


