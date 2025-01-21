<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    /** @use HasFactory<\Database\Factories\DiscountFactory> */
    use HasFactory,Filterable;
    protected $fillable = ['code','quantity','percentage','expiry_date'];


    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Adjust the format as needed
    }
    public function getUpdatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d'); // Adjust the format as needed
    }

    public function categories() {
        return $this->hasMany(Category::class);
    }
}
