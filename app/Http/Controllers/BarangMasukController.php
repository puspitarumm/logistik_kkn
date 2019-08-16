<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Carbon;
use App\Models\Barang;
use App\Models\UkuranBarang;

class BarangMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    $data['barang_masuk'] = BarangMasuk::orderBy('id_brg_masuk','desc')->with('barang','ukuran_barang')->get();
    $data['barang'] = Barang::all();
    $data['ukuran'] = UkuranBarang::all();
	return view('barangmasuk', $data);
    
    }
    public function create(Request $request)
    {
    	// dd($request->first_name);
    	// query insert dengan eloquent
    	$c = new BarangMasuk();
        $c->tgl_masuk = $request->tgl_masuk;
        $c->id_barang = $request->id_barang;
        $c->jml_masuk = $request->jml_masuk;
		$c->save();
    	return redirect('barangmasuk');
    }
    public function update(Request $request, $id_brg_masuk){
    	//cek isi customer id
    	// dd($customer_id);
    	$c = BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->first();
        $c->tgl_masuk = $request->tgl_masuk;
        $c->id_barang = $request->id_barang;
        $c->nama_barang = $request->nama_barang;
        $c->jumlah_masuk = $request->jumlah_masuk;
        $c->ukuran_barang = $request->ukuran_barang;
		$c->update();
		return redirect('barangmasuk');
    }

    public function delete($id_brg_masuk){
    	BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->delete();
        return redirect('barangmasuk');
    }

    public function add_masuk(){
        return view('barangmasuk.tambah_barangmasuk');
    }
}
