<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getHomePage()
    {
        $bestSellingBooks = Book::select('books.id', 'books.name')
            ->join('book_orders', 'books.id', '=', 'book_orders.book_id')
            ->selectRaw('SUM(book_orders.quantity) as total_quantity_sold')
            ->groupBy('books.id')
            ->orderByDesc('total_quantity_sold')
            ->limit(10)
            ->get();


        $books = Book::where('discountable_type', 'App\Models\FlashSale')
        ->join('flash_sales','flash_sales.id','=','books.discountable_id')
        ->where('flash_sales.is_active',true)
        ->get();


        return view('website.home', compact('bestSellingBooks','books'));
    }
    function getBooksPage()  {
        return view('website.books');
    }
    function getRegisterPage()  {
        return view('website.auth.register');
    }
    function getLoginPage()  {
        return view('website.auth.login');
    }
}
