<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index(){
        $data['lokasi'] = Lokasi::get();
        return view('lokasi.lokasi',$data);
    }

    public function create(Request $request){
        $c = new Lokasi();
        $c->kode_lokasi = $request->kode_lokasi;
        $c->lokasi = $request->lokasi;
		$c->save();
    	return redirect('lokasi/lokasi');
    }

    public function update(Request $request, $id_lokasi){
    	//cek isi customer id
    	// dd($customer_id);
    	$c = Lokasi::where('id_lokasi',$id_lokasi)->first();
        $c->kode_lokasi = $request->kode_lokasi;
        $c->lokasi = $request->lokasi;
		$c->update();
		return redirect('lokasi/lokasi');
    }

    public function delete($id_lokasi){
    	Lokasi::where('id_lokasi',$id_lokasi)->delete();
        return redirect('lokasi/lokasi');
    }
}
