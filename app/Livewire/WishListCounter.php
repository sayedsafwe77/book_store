<?php

namespace App\Livewire;

use App\Models\AddToFavorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishListCounter extends Component
{
    public $wishListCount = 0;

    protected $listeners = ['wishListUpdated' => 'updateWishListCount'];

    public function mount()
    {
        if (Auth::check()) {
            $this->wishListCount = AddToFavorite::where('user_id', Auth::id())->count();
        } else {
            $this->wishListCount = count(session()->get('wishlist', []));
        }
    }

    public function updateWishListCount()
    {
        if (Auth::check()) {
            $this->wishListCount = AddToFavorite::where('user_id', Auth::id())->count();
        } else {
            $this->wishListCount = count(session()->get('wishlist', []));
        }
    }

    public function render()
    {
        return view('livewire.wish-list-counter');
    }
}
