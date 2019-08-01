<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class BarangController extends Controller
{
   
    public function index()
    {
        $data['barang'] = Barang::orderBy('id_barang','desc')->get();
       
        // return $data;
        // $data['barang_x'] F= Barang::where('id_barang',10)->first();
        // $data['ukuran_barang2'] = UkuranBarang::pluck('ukuran_barang', 'id_ukuran');
        // $data['selectedID'] = 2;
        return view('barang',$data);
    }

    public function create(Request $request){
      // return $request;
      $c = new Barang();
      $c->id_barang = $request->id_barang;
      $c->nama_barang = $request->nama_barang;
      $c->save();
      return redirect('barang');
    }

    public function update(Request $request,$id_barang){
      $c = Barang::where('id_barang',$id_barang)->first();
      $c->nama_barang = $request->nama_barang;
      $c->stok = $request->stok;
      $c->id_ukuran = $request->id_ukuran;
      $c->ukuran_barang = $request->ukuran_barang;
      $c->update();
      return redirect('barang');

    }

    public function delete($id_barang){
    	Barang::where('id_barang',$id_barang)->delete();
        return redirect('barang');
    }
}