<?php

namespace App\Livewire;
use App\Models\AddToCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartSummaryComponent extends Component
{
    public $book;
    public $quantity;
    protected $listeners = ['removeItemFromChild' => 'removeItem'];

    function updateAddToCartQuantity($user_id, $book_id, $quantity)
    {
        if ($user_id) {
            $query = AddToCart::where('user_id', Auth::id())->where('book_id', $book_id);
            $quantity ? $query->update(['quantity' => $quantity]) : $query->delete();
        } else {
            $cart = Session::get('cart', []);
            if($quantity)  $cart[$book_id] = $quantity;
            else unset($cart[$book_id]);
            Session::put('cart', $cart);
        }
    }
    public function increment()  {
        $this->quantity++;
        $this->updateAddToCartQuantity(Auth::id(),$this->book->id,$this->quantity);
        $this->dispatch('change-total', bookId: $this->book->id,quantity: $this->quantity);
    }
    public function decrement()  {
        if($this->quantity == 1) return;
        $this->quantity--;
        $this->updateAddToCartQuantity(Auth::id(),$this->book->id,$this->quantity);
        $this->dispatch('change-total', bookId: $this->book->id,quantity: $this->quantity);
    }
    function removeItem($book_id)  {
        if($book_id == $this->book->id){
            $this->quantity = 0;
            $this->updateAddToCartQuantity(Auth::id(),$book_id,$this->quantity);
        }
    }

    public function render()
    {
        return view('livewire.card-summary-component');
    }
}
