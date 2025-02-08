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
    function getHomePage()  {
        $books = $this->getRecommendedBooks(Auth::id());
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

    public function getBooksFromPreferences($userId)
    {
        return Book::whereHas('category', function ($query) use ($userId) {
                $query->whereIn('id', UserPrefrence::where('user_id', $userId)->pluck('category_id'));
            })
            ->orWhereHas('author', function ($query) use ($userId) {
                $query->whereIn('id', UserPrefrence::where('user_id', $userId)->pluck('author_id'));
            })
            ->whereNotIn('id', BookInteraction::where('user_id', $userId)->pluck('book_id'))
            ->inRandomOrder()
            ->limit(10)
            ->get();
    }
    public function getBooksFromSimilarUsers($userId)
    {
        return Book::whereIn('id', function ($query) use ($userId) {
                $query->select('book_id')
                    ->from('book_interactions')
                    ->whereIn('user_id', function ($subQuery) use ($userId) {
                        $subQuery->select('user_id')
                            ->from('book_interactions')
                            ->where('book_id', function ($subQuery2) use ($userId) {
                                $subQuery2->select('book_id')
                                    ->from('book_interactions')
                                    ->where('user_id', $userId);
                            })
                            ->where('user_id', '!=', $userId);
                    })
                    ->where('rate', '>=', 4);
            })
            ->whereNotIn('id', BookInteraction::where('user_id', $userId)->pluck('book_id'))
            ->orderByDesc('rate')
            ->limit(10)
            ->get();
    }

    public function getRecommendedBooks($userId)
    {
        return Cache::remember("recommended_books_{$userId}", now()->addMinutes(30), function () use ($userId) {
            $preferenceBooks = $this->getBooksFromPreferences($userId);
            $similarUserBooks = $this->getBooksFromSimilarUsers($userId);

            // Merge and sort by rating (if available)
            $recommendations = $preferenceBooks->merge($similarUserBooks)->sortByDesc('rate');

            return $recommendations->take(10); // Limit to 10 books
        });
    }
}
