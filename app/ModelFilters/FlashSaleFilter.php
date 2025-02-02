<?php

namespace App\ModelFilters;

use App\Models\FlashSale;
use EloquentFilter\ModelFilter;

class FlashSaleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    function saleName($value){
        return $this->where(function($query) use($value){
            $query->whereLike('name->en',"%$value%")
            ->orWhereLike('name->ar',"%$value%");
        });
    }
    function description($value){
        return $this->where(function($query) use($value){
            $query->whereLike('description->en',"%$value%")
            ->orWhereLike('description->ar',"%$value%");
        });
    }
}
