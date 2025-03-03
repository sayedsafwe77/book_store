<?php

use App\Builders\OrderBuilder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ResetPasswordController;
use App\InteractionTypesEnum;
use App\Models\AddToCart;
use App\Models\AddToFavorite;
use App\Models\BookInteraction;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\PaymentController;
use App\Models\Book;
use App\Models\FlashSale;
use App\Models\Order;
use App\PaymentTypeEnum;
use Illuminate\Support\Facades\Http;

Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'getHomePage')->name('home');
    Route::get('/register', 'getRegisterPage')->name('register');
    Route::get('/login', 'getLoginPage')->name('login');
    Route::get('/books', 'getBooksPage')->name('book');
    Route::get('/search', 'searchForBooksUsingFulltext')->name('book.search');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login' , 'login')->name('postLogin');
    Route::get('/logout' , 'logout')->name('logout');
});

Route::controller(ForgetPasswordController::class)->group(function(){
    Route::get('/enter/email', 'showEnterEmail')->name('showEnterEmail');
    Route::post('/send/otp', 'sendOtp')->name('sendOtp');
    Route::get('/{email}/enter/code', 'showEnterOtp')->name('showEnterOtp');
    Route::post('/check/otp', 'checkOtp')->name('checkOtp');
});

Route::controller(ResetPasswordController::class)->prefix('reset/password')->group(function(){
    Route::get('/{email}/{code}', 'showResetPassword')->name('showResetPassword');
    Route::post('', 'resetPassword')->name('resetPassword');
});


Route::post('/register', [RegisterController::class,'register'])->name('postRegister');

Route::post('adminlogout',[LoginController::class, 'adminLogout'])->name('adminLogout');


Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function(){
    Route::post('/item/{book_id}', 'addItem')->name('add');
    Route::get('/', 'index')->name('index');
    Route::delete('/{book_id}', 'removeItem')->name('remove');
});
Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function(){
    Route::post('/', 'create')->name('create');
    Route::get('/{order:number}', 'show')->name('show');
});

Route::get('/test/cache',function(){
    // Cache::clear();
    // $orderBuilder = new OrderBuilder;

    $books = Book::whereIn('id',[1,2,3,4])->get();
    // dd($books->where('id','!=',1)->get());
});
Route::get('/pay', [PaymentController::class, 'pay']);
Route::get('/callback', [PaymentController::class, 'callback']);
