<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaymentController;
use App\Models\Book;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Http;

Route::get('/', [HomeController::class,'getHomePage']);
Route::get('/books', [HomeController::class,'getBooksPage']);

Route::post('adminlogout',[LoginController::class, 'adminLogout'])->name('adminLogout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pay', [PaymentController::class, 'pay']);
Route::get('/callback', [PaymentController::class, 'callback']);
