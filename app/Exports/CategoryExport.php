<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryExport implements FromCollection,WithMapping,WithHeadings
{
     /**
     * Retrieve the collection of categories.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Category::all();
    }
    public function map($category): array
    {
        return [
            $category->id,
            $category->getTranslation('name','en'),
            $category->getTranslation('name','ar')
        ];
    }


    /**
     * Define the headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return ['Name (English)', 'Name (Arabic)'];
    }
}
