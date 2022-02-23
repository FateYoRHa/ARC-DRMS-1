<?php

namespace App\Imports;

use App\Models\Import;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class ImportFile implements ToModel, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Import([
            'id_number' => $row[0],
            'fName' => $row[1],
            'mName' => $row[2],
            'lName' => $row[3],
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
