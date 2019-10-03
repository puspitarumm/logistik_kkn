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
        $cekniu = Mahasiswa::where('niu',$rows['niu'])->get();
        if (count($cekniu)==0){
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
        }
    
        }
      
    }

