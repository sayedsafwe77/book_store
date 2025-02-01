<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Category;
use App\Observers\BookObserver;
use Carbon\Carbon;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Book extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory,InteractsWithMedia,Filterable;
    public $fillable = [
        'name','description','slug','image','quantity','rate','publish_year','price','is_available','category_id','publisher_id','author_id','discountable_type','discountable_id'
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

        public function discountable(){
            return $this->morphTo();
        }

        function getActiveDiscountValue() {
            $discount = $this->discountable;
            $discount_expired = false;
            $current_date = Carbon::now();
            $discount_value = 0;
            if($discount){
                if($discount instanceof Discount){
                    if($discount->quantity <= 0 || $current_date->diffInDays($discount->expiry_date) <= 0) $discount_expired = true;
                }else{
                    $expiry_date = Carbon::createFromFormat("Y-m-d H:i:s","$discount->date $discount->start_time")->addHours($discount->time);
                    if(!$discount->is_active || $current_date->diffInDays($expiry_date) <= 0) $discount_expired = true;
                }
            }

            if(!$discount || $discount_expired){
                $discount = $this->category->discount;
                if($discount){
                    if($discount->quantity <= 0 || $current_date->diffInDays($discount->expiry_date) <= 0) return 0;
                }
            }
            if($discount && !$discount_expired){
                $discount_value = $this->price * $discount->percentage / 100;
            }
            return $discount_value;
        }



        public function getActiveDiscountValue2(): float
        {
            $discount = $this->getValidDiscount();

            return $discount ? ($this->price * $discount->percentage / 100) : 0;
        }

        private function getValidDiscount()
        {
            $discount = $this->discountable;

            if ($discount && !$this->isDiscountExpired($discount)) {
                return $discount;
            }

            $categoryDiscount = $this->category->discount ?? null;

            return ($categoryDiscount && !$this->isDiscountExpired($categoryDiscount))
                ? $categoryDiscount
                : null;
        }

        private function isDiscountExpired($discount): bool
        {
            if ($discount instanceof Discount) {
                return $discount->quantity <= 0 || $discount->expiry_date->isPast();
            }

            $expiryDate = Carbon::createFromFormat("Y-m-d H:i:s", "$discount->date $discount->start_time")
                                ->addHours($discount->time);

            return !$discount->is_active || $expiryDate->isPast();
        }
}
