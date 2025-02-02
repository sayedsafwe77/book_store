<?php

namespace App\Imports;

use App\Models\Discount;
use Maatwebsite\Excel\Concerns\ToModel;

class DiscountImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Discount([
            "code" => $row[0],
            "quantity" => $row[1],
            "percentage" => $row[2],
            "expiry_date" => $row[3],
        ]);
    }
}
