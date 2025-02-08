<?php

namespace App\Observers;

use App\InteractionTypesEnum;
use App\Models\AddToFavorite;

class AddToFavoriteObserver
{
    public function creating(AddToFavorite $addToFavorite)
    {
        $addToFavorite->interaction_type = InteractionTypesEnum::Favorite;
    }
}
