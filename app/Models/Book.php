<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use EloquentFilter\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory,InteractsWithMedia,Filterable;
    public $fillable = [
        'name','description','slug','image','quantity','rate','publish_year','price','is_available','category_id','publisher_id','author_id'
    ];

    //! 002 Set realtions
        //* 2.1
        public function author(){
            return $this->belongsTo(Author::class);
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
