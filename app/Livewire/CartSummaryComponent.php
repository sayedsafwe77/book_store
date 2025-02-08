<?php

namespace App\Livewire;

use Livewire\Component;

class CartSummaryComponent extends Component
{
    public $total;
    public $shipping_areas;
    public function render()
    {
        return view('livewire.cart-summary-component');
    }
}
