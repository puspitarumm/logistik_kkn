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
use App\Exports\MahasiswaExport;
use App\Models\Lokasi;



class MahasiswaController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
	{
		$mahasiswa = Mahasiswa::with('periode','ukuran_barang')->get();
		
		// return $mahasiswa[0]['ukuran_barang']['ukuran_barang'];
		return view('mahasiswa',['mahasiswa'=>$mahasiswa]);
	}
	
    public function import_excel(Request $request) 
	{
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
		]);
        if ($request->hasFile('file')) {
            //UPLOAD FILE
            $file = $request->file('file'); //GET FILE
            Excel::import(new MahasiswaImport, $file); //IMPORT FILE
			session([
                'success' => ['Mahasiswa berhasil ditambahkan'],
            ]);
            return back();
		}
	}
		

	public function export_excel(Request $request)
	{
		
		return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
	}

	public function tambah_mahasiswa(Request $request){
		$data['lokasi'] = Lokasi::all();
		$data['ukuran_barang'] = UkuranBarang::all();
		$data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
		return view('mahasiswa/tambah_mahasiswa',$data);
	}

	public function save(Request $request){
		$c = new Mahasiswa();
		$c->niu = $request->niu;
		$c->nama = $request->nama;
		$c->fakultas = $request->fakultas;
        $c->id_lokasi = $request->kode_lokasi;
		$c->save();
    	return redirect('datamahasiswa');
	}

	public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("mahasiswa")->whereIn('niu',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

	
    
}

