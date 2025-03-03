<?php

namespace App\Livewire;

use App\Models\AddToCart;
use App\Models\ShippingArea;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartPageComponent extends Component
{
    public $books;
    public $cart;
    public $shipping_areas;
    public $total;
    protected $listeners = ['remove-book' => 'handleRemoveItem','update-quantity'=> 'handleUpdateQuantity'];

    function mount() {
        $this->shipping_areas = ShippingArea::select('id','fee','name')->get();

        $this->calculateTotal();
    }
    public function render()
    {
        return view('livewire.cart-page-component');
    }
    function handleRemoveItem($book_id)  {
        $this->removeBookFromCart($book_id);
        $this->removeBookFromList($book_id);
        $this->calculateTotal();
    }
    function handleUpdateQuantity($book_id,$quantity){
        $this->cart[$book_id] = $quantity;
        $this->calculateTotal();
    }
    function removeBookFromCart($book_id){
        if(Auth::check()){
            AddToCart::where('user_id',Auth::id())->where('book_id',$book_id)->delete();
        }else{
            $cart = Session::get('cart',[]);
            unset($cart[$book_id]);
            Session::put('cart',$cart);
        }
    }
    function removeBookFromList($book_id){
        $this->books = $this->books->reject(fn($b) => $b->id == $book_id);
    }
    function calculateTotal(){
        $this->total = 0;
        $this->books->each(fn($book) => $this->total += $book->price * $this->cart[$book->id]);
    }
}
