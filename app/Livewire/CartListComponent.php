<?php

namespace App\Livewire;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class CartListComponent extends Component
{
    public $books;
    public $cart;

    // protected $listeners = ['refreshCartList' => '$refresh']; // Force component to re-render

    public function render()
    {
        return view('livewire.cart-list-component');
    }
}
