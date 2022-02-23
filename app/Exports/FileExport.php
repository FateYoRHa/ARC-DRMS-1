<?php

namespace App\Exports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FileExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Import::select('id_number', 'fName', 'mName', 'lName')->get();
    }

    public function headings(): array
    {
        return ['ID NUMBER', 'First Name', 'Middle Name', 'Last Name'];
    }
}
