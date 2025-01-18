<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('adminlogout',[LoginController::class, 'adminLogout'])->name('adminLogout');
// Route::post('adminlogout',function(){
//     return 'here';
// })->name('adminLogout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


