<?php

namespace App\Http\Controllers;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;
use Illuminate\Http\Request;
use App\Models\CobaMahasiswa;
use App\Models\UkuranBarang;
use App\Models\Periode;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use DB;
use Session;
use App\Imports\MahasiswaImport;
use Maatwebsite\Excel\Concerns\ToArray;
use App\Exports\MahasiswaExport;
use App\Models\Lokasi;



class DataMahasiswaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
	// {
	// 	$mahasiswa = CobaMahasiswa::with('periode','ukuran_barang')->get();
	// 	$lokasi = Lokasi::all();
	// 	// return $mahasiswa[0]['ukuran_barang']['ukuran_barang'];
	// 	return view('mahasiswa/datamahasiswa',['mahasiswa'=>$mahasiswa,'lokasi'=>$lokasi]);
	// }
	
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
	public function export_excel()
	{
		return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
	}

	// public function tambah_mahasiswa(Request $request){
	// 	$data['lokasi'] = Lokasi::all();
	// 	$data['ukuran_barang'] = UkuranBarang::all();
	// 	$data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
	// 	return view('datamahasiswa/tambah_mahasiswa',$data);
	// }

	public function save(Request $request){
        $data['lokasi'] = Lokasi::all();
        $data['ukuran_barang'] = UkuranBarang::all();
        $data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
        return $data['tahun'];
		$c->niu = $request->niu;
		$c->nama = $request->nama;
		$c->fakultas = $request->fakultas;
        $c->id_lokasi = $request->kode_lokasi;
        $save=CobaMahasiswa::create($data);
    	return redirect('mahasiswa/datamahasiswa');
	}

	
    
}

