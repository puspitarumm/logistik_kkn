<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use App\Models\UkuranBarang;
use App\Models\Periode;
use Maatwebsite\Excel\Concerns\FromCollection;

class MahasiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mahasiswa::all();
    }
}
