<?php

namespace App\Exports\Excel;

use App\Models\Slider;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SlidersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Slider::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Title',
            'Content',
            'Slug',
            'Category ID',
            'Image',
        ];
    }
}
