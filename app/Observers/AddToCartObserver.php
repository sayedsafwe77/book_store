<?php

namespace App\Observers;

use App\Models\AddToCart;

class AddToCartObserver
{
    public function creating(AddToCart $addToCart): void
    {
        dd($addToCart);
    }
}
