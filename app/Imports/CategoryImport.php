<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Category::updateOrCreate(['name->en' => $row[0]],[
            'name' => [
                'en' => $row[0],
                'ar' => $row[1],
            ]
        ]);
    }
}
