<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ImportFile implements ToModel, SkipsEmptyRows, WithHeadingRow, WithUpserts, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Import([
            'id_number' => $row['student_id'],
            'lName' => $row['last_name'],
            'fName' => $row['given_name'],
            'mName' => $row['middle_name'],
            'course' => $row['complete_program_name'],
        ]);
    }
    
    /**
     * @return string|array
     */
    public function uniqueBy()
    {
        return 'id_number';
    }
}
