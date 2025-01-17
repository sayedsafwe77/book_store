<?php

use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DiscountController;
use App\Http\Controllers\Dashboard\ExportController;
use App\Http\Controllers\Dashboard\FlashSaleController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\ImportExcelController;
use App\Http\Controllers\Dashboard\PublisherController;
use App\View\Components\ImportExcel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::middleware('dashboard')->group(function(){
    Route::get('/',[HomeController::class,'index']);

    Route::resource('discount',DiscountController::class);
    Route::resource('publisher',PublisherController::class);
    Route::resource('author', AuthorController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('flash_sale',FlashSaleController::class);

    Route::post('/add/discount/{category}',[CategoryController::class,'addDiscount'])->name('category.add.discount');

    Route::get('change-language/{lang}', [HomeController::class,'changeLanguage'])->name('change.language');
    Route::post('/delete-items', [HomeController::class, 'bulkDelete'])->name('items.bulk-delete');
    Route::post('/import/excel', ImportExcelController::class)->name('import.excel');
    Route::get('/export/excel', ExportController::class)->name('export.excel');
});


Auth::routes();
