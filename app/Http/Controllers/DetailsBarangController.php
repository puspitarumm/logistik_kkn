<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsBarang;
use App\Models\UkuranBarang;
use App\Models\Barang;


class DetailsBarangController extends Controller
{
    public function index(){
        $data['detailsbarang'] = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->get();
        $data['barang'] = Barang::all();  
        $data['ukuran_barang'] = UkuranBarang::all();
        return view('detailsbarang', $data);
        
        }
    
        public function create(Request $request)
        {
            $c = new DetailsBarang();
            $c->id_barang = $request->id_barang;
            $c->id_ukuran = $request->id_ukuran;
            $c->stok = $request->stok;
		    $c->save();
    	    return redirect('detailsbarang');
    }
            
    
            
    
        public function update(Request $request, $id_dokumen){
            //cek isi customer id
            // dd($customer_id);
            $c = Document::where('id_dokumen',$id_dokumen)->first();
            $c->nama_dokumen = $request->nama_dokumen;
            $c->id_periode = $request->id_periode;
            $c->dokumen = $request->dokumen;
            $c->update();
            return redirect('dokumen');
        }
    
        public function delete($id_dokumen){
            Document::where('id_dokumen',$id_dokumen)->delete();
            return redirect('dokumen');
        }
    
}
