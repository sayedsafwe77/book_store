<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:admin')->group(function(){
    Route::get('/',[HomeController::class,'index']);

    Route::resource('discount',DiscountController::class);
    Route::resource('category',CategoryController::class);

    Route::post('/add/discount/{category}',[CategoryController::class,'addDiscount'])->name('category.add.discount');

    // Route::prefix('discount')->name('discount.')->group(function(){
    //     Route::get('/',[DiscountController::class,'index'])->name('index');
    //     Route::get('/create',[DiscountController::class,'create'])->name('create');
    //     Route::get('/{id}',[DiscountController::class,'show'])->name('show');
    //     Route::post('/',[DiscountController::class,'store'])->name('store');

    //     Route::get('/edit/{discount}',[DiscountController::class,'edit'])->name('edit');

    //     Route::put('/edit/{discount}',[DiscountController::class,'update'])->name('update');

    //     Route::delete('/{discount:code}',[DiscountController::class,'destroy'])->name('destroy');
    // });
});
