<?php

namespace App\Imports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\ToModel;

class orderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            "number" => $row[0],
            "shipping_fee" => $row[1],
            "books_total" => $row[2],
            "total" => $row[3],
            "status" => $row[4],
            "payment_status" => $row[5],
            "payment_type" => $row[6],
            "tax_amount" => $row[7],
            "transaction_reference" => $row[8],
            "address" => $row[9],
            "shipping_area_id" => $row[10],
            "user_id" => $row[11],
            "created_at" => $row[12],
            "updated_at" => $row[13],
        ]);
    }
}