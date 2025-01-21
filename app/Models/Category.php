<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Book;

class Category extends Model implements HasMedia
{
    use HasFactory,HasTranslations,Filterable,InteractsWithMedia;
    protected $fillable = ['name','discount_id'];
    public $translatable = ['name'];
    protected $casts = ['name' => 'array'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Adjust the format as needed
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Adjust the format as needed
    }
    function discount()  {
        return $this->belongsTo(Discount::class);

    }


    //! 005 => Set realtions
     //* 5.1
     public function books(){
        return $this->hasMany(Book::class);
     }
}
