<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class OrderFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function orderNumber($value)
    {
        return $this->where('number','like', "%$value%");
    }

    public function orderStatus($value)
    {
        return $this->where('status','like', "%$value%");
    }

    public function orderPaymentStatus($value)
    {
        return $this->where('payment_status','like', "%$value%");
    }

    public function orderPaymentType($value)
    {
        return $this->where('payment_type','like', "%$value%");
    }

    public function orderShipping($value)
    {
        return $this->where('shipping_area_id', '=', $value);

    }

    public function orderUser($value)
    {
        return $this->where('user_id', '=', $value);
    }
}