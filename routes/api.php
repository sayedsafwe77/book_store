<?php

use App\Http\Controllers\Dashboard\DiscountController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('discount')->name('discount.')->group(function(){
    Route::get('/',[DiscountController::class,'checkCode'])->name('check.code');
});

Route::prefix('discount')->name('discount.')->group(function(){
    Route::get('/search',[DiscountController::class,'search'])->name('search');
});

