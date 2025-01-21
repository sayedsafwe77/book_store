<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;


class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    public $fillable = [
        'name','description','slug','image','quantity','rate','publish_year','price','is_available','category_id','publisher_id','author_id'
    ];

    //! 002 Set realtions
        //* 2.1
        public function authors(){

            return $this->belongsToMany(Author::class);
        }

        //* 2.2
        public function publishers(){
            return $this->belongsTo(Publisher::class);

        }

        //* 2.3

        public function category(){
            return $this->belongsTo(Category::class);
        }
}
