<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use EloquentFilter\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Publisher extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PublisherFactory> */
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
