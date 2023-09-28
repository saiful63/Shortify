<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlShrotnerController;
use Database\Seeders\UrlShrotnerSeeder;
use Illuminate\Support\Facades\Route;



Route::get('/',[AuthController::class,'register_view'])->name('register');

Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AuthController::class,'index'])->name('login');
    Route::post('login',[AuthController::class,'login'])->name('login')->middleware('throttle:2,1');
    Route::post('register',[AuthController::class,'register'])->name('register')->middleware('throttle:2,1');

});

Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::get('{code}',[UrlShrotnerController::class,'getShrotenOne'])->name('getShrotenOne');

    Route::resource('url_shrotner',UrlShrotnerController::class);

});


