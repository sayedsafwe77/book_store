<?php

namespace App\Livewire;

use App\Models\AddToFavorite;
use App\Models\UserPrefrence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WishList extends Component
{
    public $book;
    public $isInWishlist = false;

    public function mount($book)
    {
        $this->book = $book;

        if (Auth::check()) {
            $this->isInWishlist = AddToFavorite::where('user_id', Auth::id())->where('book_id', $book->id)->exists();
        } else {
            $wishlist = session()->get('wishlist', []);
            $this->isInWishlist = in_array($book->id, $wishlist);
        }
    }

    public function addToWishlist()
    {
        if (Auth::check()) {
            AddToFavorite::create([
                'user_id' => Auth::id(),
                'book_id' => $this->book->id,
            ]);
            $preference = UserPrefrence::firstOrNew([
                'user_id' => Auth::id(),
                'category_id' => $this->book->category_id,
                'author_id' => $this->book->author_id
            ]);
            $preference->number_of_interests = ($preference->number_of_interests ?? 0) + 1;
            $preference->save();
        } else {
            $wishlist = session()->get('wishlist', []);
            if (!in_array($this->book->id, $wishlist)) {
                $wishlist[] = $this->book->id;
                session()->put('wishlist', $wishlist);
            }
        }

        $this->isInWishlist = true;
        $this->dispatch('wishListUpdated');
    }

    public function removeFromWishlist()
    {
        if (Auth::check()) {
            AddToFavorite::where('user_id', Auth::id())->where('book_id', $this->book->id)->delete();
        } else {
            $wishlist = session()->get('wishlist', []);
            if (($key = array_search($this->book->id, $wishlist)) !== false) {
                unset($wishlist[$key]);
                session()->put('wishlist', array_values($wishlist));
            }
        }

        $this->isInWishlist = false;
        $this->dispatch('wishListUpdated');
    }

    public function render()
    {
        return view('livewire.wish-list');
    }
}
