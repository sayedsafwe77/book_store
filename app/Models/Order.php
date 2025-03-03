<?php

namespace App\Models;

use App\OrderStatusEnum;
use App\PaymentStatusEnum;
use App\PaymentTypeEnum;
use Carbon\Carbon;
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
        'user_id',
        'discount'
    ];
    protected $casts = ['status' => OrderStatusEnum::class,'payment_type' => PaymentTypeEnum::class,'payment_status' => PaymentStatusEnum::class];

    public function shippingArea()
    {
        return $this->belongsTo(ShippingArea::class, 'shipping_area_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function books()
    {
        return $this->belongsToMany(Book::class , 'book_orders')->withPivot('applied_discount','price','quantity');
    }
    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d, M Y');
    }
    public function getDiscountAttribute()
    {
        return $this->books->reduce(fn($acc,$book) => $acc + $book->pivot->applied_discount,0);
    }
    public function getPriceBeforeDiscountAttribute()
    {
        return $this->books->reduce(fn($acc,$book) => $acc + ($book->pivot->price * $book->pivot->quantity),0);
    }
    public function getStatusPercentageAttribute()
    {
        return match($this->status){
            OrderStatusEnum::Pending => 30,
            OrderStatusEnum::OutForDelivery => 60,
            OrderStatusEnum::Delivered => 100,
        };
    }

}
