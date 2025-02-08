<?php

namespace App\Livewire;

use Livewire\Component;

class CartItemComponent extends Component
{
    public $book;
    public $quantity;
    public function render()
    {
        return view('livewire.cart-item-component');
    }
}
