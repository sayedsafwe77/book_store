<?php

namespace App\Models;

use App\InteractionTypesEnum;
use App\Models\Scopes\AddToCartScope;
use App\Observers\AddToCartObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([AddToCartScope::class])]
#[ObservedBy([AddToCartObserver::class])]
class AddToCart extends Model
{
    /** @use HasFactory<\Database\Factories\AddToCartFactory> */
    use HasFactory;
    protected $table = 'book_interactions';
    protected $fillable = ['book_id','user_id','quantity','interaction_type'];
    protected $casts = ['interaction_type' => InteractionTypesEnum::class];
    function book()  {
        return $this->belongsTo(Book::class);
    }
}
