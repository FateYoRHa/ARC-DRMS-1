<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ImportFile implements ToModel, WithHeadingRow, WithUpserts
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Import([
            'id_number' => $row['id_number'],
            'fName' => $row['first_name'],
            'mName' => $row['middle_name'],
            'lName' => $row['last_name'],
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
