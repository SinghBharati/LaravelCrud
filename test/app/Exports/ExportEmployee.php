<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportEmployee implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employee::select('name',
            'mobile',
            'email',
            'gender',
            'is_married',
            'profile_image',
            'status',)
            ->get();
    }

    public function headings(): array
    {
        return [
            'name',
            'mobile',
            'email',
            'gender',
            'is_married',
            'profile_image',
            'status',
        ];
    }


}
