<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Models\Book;
use App\Models\FlashSale;

Route::get('/', [HomeController::class,'getHomePage']);
Route::get('/books', [HomeController::class,'getBooksPage'])->name('book');

Route::get('/register', [HomeController::class,'getRegisterPage'])->name('register');

Route::post('/register', [RegisterController::class,'register']);

Route::get('/login', [HomeController::class,'getLoginPage'])->name('login');

Route::post('adminlogout',[LoginController::class, 'adminLogout'])->name('adminLogout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::post('/item/{book_id}', [CartController::class, 'addItem'])->name('add');
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::delete('/{book_id}', [CartController::class, 'removeItem'])->name('remove');
});

