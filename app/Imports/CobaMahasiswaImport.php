<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use App\Models\CobaMahasiswa;
use App\Models\Lokasi;


class CobaMahasiswaImport implements ToModel,WithHeadingRow
{

   
    public function model(array $rows)
    { 
        
        $lokasi=Lokasi::where(['kode_lokasi'=>$rows['kode_lokasi'],'lokasi'=>$rows['lokasi']])->get('id_lokasi');
       
        
        $rows['kode_lokasi']=$lokasi->first()->id_lokasi;
        return new CobaMahasiswa([
            'niu' => $rows['niu'],
            'nama' => $rows['nama'], 
            'fakultas' => $rows['fakultas'], 
            'id_lokasi' => $rows['kode_lokasi'],
            // 'lokasi' => $rows['lokasi'],
            
        ]);
        Lokasi::create([
            'kode_lokasi' => $rows[kode_lokasi],
            'lokasi' => $rows[lokasi]
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

