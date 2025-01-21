<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactUs extends Model
{
    /** @use HasFactory<\Database\Factories\ContactUsFactory> */
    use HasFactory,HasTranslations;

    protected $fillable = ['name','email','message'];
    public $translatable = ['name','message'];
    protected $casts = ['name' => 'array','message' => 'array'];
}
