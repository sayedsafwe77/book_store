<?php

namespace App\Models;

use App\Models\Scopes\AddToFavoriteScope;
use App\Observers\AddToFavoriteObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
#[ScopedBy([AddToFavoriteScope::class])]
#[ObservedBy([AddToFavoriteObserver::class])]
class AddToFavorite extends Model
{
    /** @use HasFactory<\Database\Factories\AddToFavoriteFactory> */
    use HasFactory;
    protected $table = 'book_interactions';
    protected $fillable = ['user_id','book_id'];
}
