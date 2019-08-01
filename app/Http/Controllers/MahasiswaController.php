<?php

namespace App\Http\Controllers;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\UkuranBarang;
use App\Models\Periode;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use DB;
use Session;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Concerns\ToArray;



class MahasiswaController extends Controller
{
    public function index()
	{
		$mahasiswa = Mahasiswa::with('periode','ukuran_barang')->get();
		// return $mahasiswa[0]['ukuran_barang']['ukuran_barang'];
		return view('mahasiswa',['mahasiswa'=>$mahasiswa]);
	}
	
    public function import_excel() 
	{
		// Excel::import_excel(new MahasiswaImport, 'mahasiswa.xls');
		// return redirect('mahasiswa')->with('success','all good!');
		$path = $_FILES['file']['tmp_name'];
		Excel::import(new MahasiswaImport,$path);
		// validasi
		// $this->validate($request, [
		// 	'file' => 'required|mimes:csv,xls,xlsx'
		// ]);

		// // menangkap file excel
		// $file = $request->file('file');

		// // membuat nama file unik
		// $nama_file = rand().$file->getClientOriginalName();

		// // upload ke folder file_siswa di dalam folder public
		// $file->move('file_siswa',$nama_file);

		// // import data
		// Excel::import(new MahasiswaImport, public_path('/file_siswa/'.$nama_file));

		// // notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/mahasiswa');
	}

	
    
}

