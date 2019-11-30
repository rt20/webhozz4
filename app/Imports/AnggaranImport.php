<?php

namespace App\Imports;

use App\Models\Anggaran;
use Maatwebsite\Excel\Concerns\ToModel;

class AnggaranImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Anggaran([
            'code' => $row[1],
            'name' => $row[2],
            'budget' => $row[3],
            'biaya' => $row[4],
            'sisa' => $row[5],
        ]);
    }
}
