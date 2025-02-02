<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Enums\Fit;

use App\Models\Book;


class Author extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\AuthorFactory> */
    use HasFactory,Filterable, InteractsWithMedia;
    protected $fillable = ['name'];



    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }


    //! 002 Set realtions
        //* 2.1
        public function books(){

            return $this->hasMany(Book::class);
        }

}
