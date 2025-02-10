<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookInteraction;
use App\Models\Category;
use App\Models\UserPrefrence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
        $bestSellingBooks = Book::with('media')->select('books.id', 'books.name')
            ->join('book_orders', 'books.id', '=', 'book_orders.book_id')
            ->selectRaw('SUM(book_orders.quantity) as total_quantity_sold')
            ->groupBy('books.id')
            ->orderByDesc('total_quantity_sold')
            ->limit(10)
            ->get();


        $books = Book::with('author','media')->where('discountable_type', 'App\Models\FlashSale')
        ->join('flash_sales','flash_sales.id','=','books.discountable_id')
        ->where('flash_sales.is_active',true)
        ->get();




        $recommended_books = [];
        if(Auth::check()){
            $recommended_books = $this->getRecommendedBooks(Auth::id());
        }
        return view('website.home', compact('bestSellingBooks','books','recommended_books'));
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
    public function getBooksFromPreferences($userId,$interests)
    {
        return Book::with('author:id,name')->whereHas('category', function ($query) use ($userId) {
                $query->whereIn('id', UserPrefrence::where('user_id', $userId)->pluck('category_id'));
            })
            ->orWhereHas('author', function ($query) use ($userId) {
                $query->whereIn('id', UserPrefrence::where('user_id', $userId)->pluck('author_id'));
            })
            ->select('id','name','description','rate','price','author_id')
            ->whereNotIn('id', $interests)
            ->inRandomOrder()
            ->limit(10)
            ->get();
    }
    public function getBooksFromSimilarUsers($userId,$interests)
    {
        return Book::with('author:id,name')->whereIn('id', function ($query) use ($userId) {
                $query->select('book_id')
                    ->from('book_interactions')
                    ->whereIn('user_id', function ($subQuery) use ($userId) {
                        $subQuery->select('user_id')
                            ->from('book_interactions')
                            ->whereIn('book_id', function ($subQuery2) use ($userId) {
                                $subQuery2->select('book_id')
                                    ->from('book_interactions')
                                    ->where('user_id', $userId);
                            })
                            ->where('user_id', '!=', $userId);
                    });
            })
            ->select('id','name','description','rate','price','author_id')
            ->whereNotIn('id', $interests)
            ->orderByDesc('rate')
            ->limit(10)
            ->get();
    }

    public function getRecommendedBooks($userId)
    {
        return Cache::remember("recommended_books_{$userId}", now()->addMinutes(30), function () use ($userId) {
            $interests = $this->getUserInterests($userId);
            $preferenceBooks = $this->getBooksFromPreferences($userId,$interests);
            $similarUserBooks = $this->getBooksFromSimilarUsers($userId,$interests);
            $recommendations = $preferenceBooks->merge($similarUserBooks)->sortByDesc('rate');
            return $recommendations->take(10);
        });
    }
    private function getUserInterests($user_id){
        return BookInteraction::where('user_id', $user_id)->pluck('book_id');
    }
}
