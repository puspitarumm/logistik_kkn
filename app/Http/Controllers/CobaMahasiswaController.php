<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CobaMahasiswa;
use App\Models\Mahasiswa;
use App\Models\Lokasikkn;
use App\Models\Periode;
use App\Models\UkuranBarang;
use DB;
use App\Imports\CobaMahasiswaImport;
use Maatwebsite\Excel\Concerns\ToArray;
use Excel;
use Validator;


class CobaMahasiswaController extends Controller
{
	public function index()
	{
		$mahasiswa = CobaMahasiswa::with('lokasikkn')->get();
		$ukuran_barang = UkuranBarang::all();
		$periode = Periode::all();
		// return $mahasiswa[0]['ukuran_barang']['ukuran_barang'];
		return view('mahasiswa/datamahasiswa',['mahasiswa'=>$mahasiswa]);
	}

	public function create(){
		$data['ukuran_barang'] = UkuranBarang::all();
		$data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
		return view('mahasiswa/tambah_mahasiswa',$data);
	}

    public function store(Request $request){
		$request->validate([
			'niu' => 'required|numeric'
		]);
		$validator = Validator::make($request->all(), [
			'niu'=>'numeric'
			]);
			if ($validator->fails()) {                      
				return back()
						   ->withErrors($validator)
				   ->withInput();                      
				} 
		$data['ukuran_barang'] = UkuranBarang::all();
		$id_periode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();  
        if(count($id_periode)==0){
            session([
                'error' => ['Periode tidak tersedia'],
            ]);
            return back();
		}

		$cekniu = Mahasiswa::where(['niu'=>$request->niu])->get();
		if(count($cekniu)==0){

			$mahasiswa = Mahasiswa::create([
			'niu' => $request->niu,
			'nama' => $request->nama,
			'fakultas' => $request->fakultas,
			'lokasi' => $request->lokasi,
			'kode_lokasi' => $request->kode_lokasi,
			'id_ukuran' => $request->id_ukuran,
			'id_periode'        => $id_periode[0]['id_periode'],
			]);
		session([
			'success' => ['Mahasiswa berhasil ditambahkan'],
		]);
		return redirect('mahasiswa');
		}else{
			session([
			  'error' => [$cekniu[0]['niu'].' sudah ada'],
		  ]);
		  return redirect('mahasiswa');
		}
}
		public function edit(Request $request, $niu){
			$data['ukuran_barang'] = UkuranBarang::all();
			$id_periode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();  
			$data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
			$data['mahasiswa'] = Mahasiswa::findOrFail($niu);
			return view('mahasiswa/edit_mahasiswa',$data);
		}

		public function update(Request $request){
			$request->validate([
				'niu' => 'required|numeric'
			]);
			$validator = Validator::make($request->all(), [
				'niu'=>'numeric'
				]);
				if ($validator->fails()) {                      
					return back()
							   ->withErrors($validator)
					   ->withInput();                      
				}

			$id_periode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get(); 
			if(count($id_periode)==0){
				session([
					'error' => ['Periode tidak tersedia'],
				]);
					return back();
			} 
				
			$cekniu = Mahasiswa::where(['niu'=>$request->niu])->get();
			if(count($cekniu)==0){
			DB::table('mahasiswa')->where('niu',$request->niu)->update([
			'niu' => $request->niu,
			'nama' => $request->nama,
			'fakultas' => $request->fakultas,
			'lokasi' => $request->lokasi,
			'kode_lokasi' => $request->kode_lokasi,
			'id_ukuran' => $request->id_ukuran,
			'id_periode' =>    $id_periode[0]['id_periode']
			]);
			session([
				'success' => ['Mahasiswa berhasil diubah'],
			]);
				return redirect('mahasiswa');
			}else{
				session([
				'error' => [$cekniu[0]['niu'].' sudah ada'],
			]);
			return redirect('mahasiswa');
			}
}

		public function destroy($niu)
		{
			$mahasiswa = CobaMahasiswa::findOrFail($niu)->delete();
			return redirect()->route('mahasiswa/datamahasiswa')->with('message', 'Data berhasil dihapus!');
		}

	
        public function deleteAll(Request $request){
			$nius = $request->get('nius');
			$dbs = DB::delete('delete from coba_mahasiswa where niu in ('.implode(",",$nius).')');
			return redirect('mahasiswa/datamahasiswa');
	}
	function massremove(Request $request)
    {
        $student_id_array = $request->input('niu');
        $mahasiswa = CobaMahasiswa::whereIn('niu', $student_id_array);
        if($mahasiswa->delete())
        {
            echo 'Data Deleted';
        }
	}
	
	public function import_excel()
    {
		$path = $_FILES['file']['tmp_name'];
		Excel::import(new CobaMahasiswaImport,$path);

        return redirect('mahasiswa/datamahasiswa')->with('success', 'All good!');
    }

}
