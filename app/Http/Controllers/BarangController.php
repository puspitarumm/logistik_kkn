<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class BarangController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data['barang'] = Barang::orderBy('id_barang','desc')->get();
        return view('listbarang',$data);
    }

    public function create(Request $request){
      $this->validate($request,[
        'nama_barang' => 'required'
      ],
      [
        'nama_barang.required' => 'nama tidak boleh kosong'
      ]
      );
      $ceknama = Barang::where(['nama_barang'=>$request->nama_barang])->get();
      if(count($ceknama)==0){
        $c = new Barang();
        $c->id_barang = $request->id_barang;
        $c->nama_barang = $request->nama_barang;
        $c->save();
        // $ceknama=Barang::where('nama_barang',$request['nama_barang'])->get();
        // return redirect('listbarang');
          session([
              'success' => ['Barang berhasil ditambahkan'],
          ]);
          return back();
      }else{
        session([
          'error' => [$ceknama[0]['nama_barang'].' sudah ada'],
      ]);
      return back();
      }
  }

    public function update(Request $request,$id_barang){
      $ceknama = Barang::where(['nama_barang'=>$request->nama_barang])->get();
      if(count($ceknama)==0){
      $c = Barang::where('id_barang',$id_barang)->first();
      $c->nama_barang = $request->nama_barang;
      $c->update();
      session([
        'success' => ['Barang berhasil diperbarui'],
    ]);
    return back();
    }else{
      session([
        'error' => [$ceknama[0]['nama_barang'].' sudah ada'],
    ]);
    return back();
    }
    }

    public function delete($id_barang){
      Barang::where('id_barang',$id_barang)->delete();
      session([
        'success' => ['Barang berhasil dihapus'],
      ]);
        return redirect('listbarang');
    }
}
