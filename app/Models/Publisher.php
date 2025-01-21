<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
class Publisher extends Model
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
    use HasFactory,Filterable;
    protected $fillable = ['name'];

     //! 002 Set realtions
        //* 2.1
        public function books(){

            return $this->hasMany(Book::class);
        }
}
