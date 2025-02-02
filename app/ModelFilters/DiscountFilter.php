<?php

namespace App\ModelFilters;

use Carbon\Carbon;
use EloquentFilter\ModelFilter;

class DiscountFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    public function discountCode($value)
    {
        return $this->where('code', 'LIKE', "%$value%");
    }
    public function quantity($value)
    {
        return $this->where('quantity', 'LIKE', "%$value%");
    }
    public function percentage($value)
    {
        return $this->where('percentage', 'LIKE', "%$value%");
    }
    public function expiryDate($value)
    {
        $formattedValue = Carbon::parse($value)->format('Y-m-d');

        return $this->where('expiry_date', 'LIKE', "%$formattedValue%");
    }

}
