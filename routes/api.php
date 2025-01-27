<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\FlashSaleController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('discount')->name('discount.')->group(function(){
    Route::get('/',[DiscountController::class,'checkCode'])->name('check.code');
    Route::get('/search',[DiscountController::class,'search'])->name('search');
});
Route::prefix('flash_sale')->name('flash_sale.')->group(function(){
    Route::get('/search',[FlashSaleController::class,'search'])->name('search');
});




Route::prefix('order')->name('order.')->group(function(){
    Route::get('/',[OrderController::class,'checkCode'])->name('check.code') ;
 });
