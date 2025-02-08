<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutSummaryComponent extends Component
{
    public $shipping_areas;
    public $total;
    public function render()
    {
        return view('livewire.checkout-summary-component');
    }
}
