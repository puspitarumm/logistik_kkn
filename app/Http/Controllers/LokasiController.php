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
        $ceklokasi = Lokasi::where(['kode_lokasi'=>$request['kode_lokasi']])->get();
        if(count($ceklokasi)==0){
        $c = new Lokasi();
        $c->kode_lokasi = $request->kode_lokasi;
        $c->lokasi = $request->lokasi;
        $c->save();
        session([
            'success' => ['Lokasi berhasil ditambahkan'],
        ]);
    	return redirect('lokasi/lokasi');
        }
        else{
            session([
              'error' => [$ceklokasi[0]['kode_lokasi'].' sudah ada'],
          ]);
          return back();
        }
        }

    public function update(Request $request, $kode_lokasi){
    	$c = Lokasi::where('kode_lokasi',$kode_lokasi)->first();
        $c->lokasi = $request->lokasi;
        $c->update();
        session([
            'success' => ['Lokasi berhasil diubah'],
        ]);
		return redirect('lokasi/lokasi');
    }

    public function delete($kode_lokasi){
    	Lokasi::where('kode_lokasi',$kode_lokasi)->delete();
        return redirect('lokasi/lokasi');
    }
}
