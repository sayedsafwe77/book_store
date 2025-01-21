<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author extends Model
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory,Filterable;
    protected $fillable = ['name'];

    //! 002 Set realtions
        //* 2.1
        public function books(){

            return $this->hasMany(Book::class);
        }

    
}
