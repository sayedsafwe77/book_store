<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory,Filterable;

    protected $fillable = [
        'number',
        'shipping_fee',
        'books_total',
        'total',
        'status',
        'payment_status',
        'payment_type',
        'tax_amount',
        'transaction_reference',
        'address',
        'shipping_area_id',
        'user_id'
    ];


    public function shippingArea()
    {
        return $this->belongsTo(ShippingArea::class, 'shipping_area_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}