<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Book;
use App\Models\FlashSale;

Route::get('/', [HomeController::class,'getHomePage']);
Route::get('/books', [HomeController::class,'getBooksPage']);

Route::post('adminlogout',[LoginController::class, 'adminLogout'])->name('adminLogout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

