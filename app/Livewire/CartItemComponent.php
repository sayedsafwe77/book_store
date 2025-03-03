<?php

namespace App\Livewire;

use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartItemComponent extends Component
{
    public $book;
    public $quantity;
    public function render()
    {
        return view('livewire.cart-item-component');
    }
    function removeItem()  {
        $this->dispatch('remove-book',$this->book->id);
    }
    public function increment()  {
        $this->quantity++;
        $this->updateAddToCardQuantity(Auth::id(),$this->book->id,$this->quantity);
        $this->dispatch('update-quantity',$this->book->id,$this->quantity);
    }
    public function decrement()  {
        if($this->quantity == 1) return;
        $this->quantity--;
        $this->updateAddToCardQuantity(Auth::id(),$this->book->id,$this->quantity);
        $this->dispatch('update-quantity',$this->book->id,$this->quantity);
    }

    private function updateAddToCardQuantity($user_id,$book_id,$quantity){
        if($user_id){
            AddToCart::where('user_id',Auth::id())->where('book_id',$book_id)->update(['quantity' => $quantity]);
        }else{
            $cart= Session::get('cart');
            $cart[$book_id] = $quantity;
            Session::put('cart');
        }
    }
}
