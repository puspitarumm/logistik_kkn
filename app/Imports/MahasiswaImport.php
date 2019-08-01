<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use App\Models\Mahasiswa;
use App\Models\UkuranBarang;
use App\Models\Periode;


class MahasiswaImport implements ToModel,WithHeadingRow
{

   
    public function model(array $rows)
    {
        
        $ukuran=UkuranBarang::where('ukuran_barang',$rows['ukuran_kaos'])->get('id_ukuran');
        $periode=Periode::where(['nama_periode'=>$rows['periode'],'tahun'=>$rows['tahun']])->get('id_periode');
        $rows['ukuran_kaos']=$ukuran->first()->id_ukuran;
        // dd($periode);
        $rows['periode']=$periode->first()->id_periode;
        // dd($rows);
        return new Mahasiswa([
            'niu' => $rows['niu'],
            'nama' => $rows['nama'], 
            'fakultas' => $rows['fakultas'], 
            'lokasi' => $rows['lokasi'],
            'kode_lokasi' => $rows['kode_lokasi'],
            'id_ukuran' =>$rows['ukuran_kaos'],
            'id_periode' => $rows['periode'],
            'tahun' => $rows['tahun'],
        ]);
        // return new Mahasiswa ($rows as $row){
        //     Mahasiswa::create([
        //         'niu' => $row[1],
        //         'nama' => $row[2], 
        //         'fakultas' => $row[3], 
        //         'lokasi' => $row[4],
        //         'kode_lokasi' => $row[5],
        //     ]);
        //     return new Siswa([
        //         'nama' => $row[1],
        //         'nis' => $row[2], 
        //         'alamat' => $row[3], 
        //     ]);
        // }

        //     UkuranBarang::create([
        //         'ukuran_barang' =>$row[6],
        //     ]);
        //     Periode::create([
        //         'periode' => $row[7],
        //         'tahun' => $row[8],
        //     ]);
        }
        // return new Mahasiswa([
            
        //     'id_ukuran' => $row[6], 
        //     'id_periode' => $row[7],

        // ]);
    }

