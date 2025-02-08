<?php

namespace App\Observers;

use App\InteractionTypesEnum;
use App\Models\AddToCart;

class AddToCartObserver
{
    public function creating($addToCart)
    {
        $addToCart->interaction_type = InteractionTypesEnum::Cart;
    }
}
