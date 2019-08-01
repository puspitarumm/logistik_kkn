<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class BarangKeluarController extends Controller
{
    public function index(){
        $data['barang_keluar'] = BarangKeluar::orderBy('id_brg_keluar','desc')->paginate(10);
            $data['barang_keluar_x'] = BarangKeluar::where('id_brg_keluar',10)->first();
            return view('barangkeluar', $data);
        
        }
        public function create(Request $request)
        {
            // dd($request->first_name);
            // query insert dengan eloquent
            $c = new BarangMasuk();
            $c->tgl_masuk = $request->tgl_masuk;
            $c->id_barang = $request->id_barang;
            $c->nama_barang = $request->nama_barang;
            $c->jumlah_masuk = $request->jumlah_masuk;
            $c->ukuran_barang = $request->ukuran_barang;
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
    
    
}