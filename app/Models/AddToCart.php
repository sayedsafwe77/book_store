<?php

namespace App\Models;

use App\Observers\AddToCartObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ObservedBy([AddToCartObserver::class])]
class AddToCart extends Model
{
    /** @use HasFactory<\Database\Factories\AddToCartFactory> */
    protected $table = 'book_interactions';
    use HasFactory;
    protected $fillable = ['book_id','user_id','quantity'];

}
