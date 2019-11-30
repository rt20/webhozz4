<?php

namespace App\Exports;

use App\Models\Anggaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnggaranExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anggaran::all();
    }
}
