<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPrefrence extends Model
{
    /** @use HasFactory<\Database\Factories\UserPrefrenceFactory> */
    use HasFactory;
    protected $fillable = ['number_of_interests','user_id','category_id','author_id'];
}
