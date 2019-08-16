<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class DataMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    $data['datamahasiswa'] = DataMahasiswa::orderBy('nim','desc')->paginate(10);
    $data['datamahasiswa_x'] = DataMahasiswa::where('nim',10)->first();

    return view('datamahasiswa',$data);

    }

    public function create(Request $request){
        $c = new DataMahasiswa();
        $c->nim = $request->nim;
        $c->nama = $request->nama;
        $c->fakultas = $request->fakultas;
        $c->lokasi = $request->lokasi;
        $c->kode_lokasi = $request->kode_lokasi;
        $c->ukuran_barang = $request->ukuran_barang;
        $c->save();
    	return redirect('datamahasiswa');
    }

    public function update(Request $request, $nim){
    $c = DataMahasiswa::where('nim',$nim)->first();
        $c->nama = $request->nama;
        $c->fakultas = $request->fakultas;
        $c->lokasi = $request->lokasi;
        $c->kode_lokasi = $request->kode_lokasi;
        $c->ukuran_barang = $request->ukuran_barang;
    $c->update();
    return redirect('datamahasiswa');
}

public function delete($nim){
    DataMahasiswa::where('nim',$nim)->delete();
    return redirect('datamahasiswa');
}
}
