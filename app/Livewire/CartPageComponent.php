<?php

namespace App\Livewire;

use App\Models\ShippingArea;
use Livewire\Component;

class CartPageComponent extends Component
{
    public $books;
    public $cart;
    public $shipping_areas;
    public $total;
    function mount() {
        $this->shipping_areas = ShippingArea::select('id','fee','name')->get();
        $this->total = 0;
    }
    public function render()
    {
        return view('livewire.cart-page-component');
    }
}
