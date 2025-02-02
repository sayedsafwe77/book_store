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
    function getHomePage()  {
        return view('website.home');
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
