<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsBarang;
use App\Models\UkuranBarang;
use App\Models\Barang;
use Validator;


class DetailsBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['detailsbarang'] = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->get();
        $data['barang'] = Barang::all();  
        $data['ukuran_barang'] = UkuranBarang::all();
        return view('detailsbarang', $data);
        }
    
        public function create(Request $request)
        {
            $request->validate([
                'stok'    =>  'numeric',
            ]);
            $validator = Validator::make($request->all(), [
                'stok'=>'numeric'
                ]);
                if ($validator->fails()) {                      
                    return back()
                               ->withErrors($validator)
                       ->withInput();                      
                    }        
            $cekdetails = DetailsBarang::where(['id_barang'=>$request->id_barang,'id_ukuran'=>$request->id_ukuran])->get();
            if(count($cekdetails)==0){
            $c = new DetailsBarang();
            $c->id_barang = $request->id_barang;
            $c->id_ukuran = $request->id_ukuran;
            $c->stok = $request->stok;
            $c->save();
            session([
                'success' => ['Details barang berhasil ditambahkan'],
            ]);
            return back();
        }else{
            session([
              'error' => ['Tidak dapat menambah details barang '. $cekdetails[0]['id_barang']['id_ukuran'].' sudah ada'],
          ]);
          return back();
          }
    }

        public function update(Request $request, $id_details){
            $request->validate([
                'stok'    =>  'numeric',
            ]);
            $validator = Validator::make($request->all(), [
                'stok'=>'numeric'
                ]);
                if ($validator->fails()) {                      
                    return back()
                    ->withErrors($validator)
                       ->withInput();                      
                    }        
            $cekdetails = DetailsBarang::where(['id_barang'=>$request->id_barang,'id_ukuran'=>$request->id_ukuran])->get();
            // return $cekdetails[0]['id_details'];
            if(count($cekdetails)==0 ){
            if($cekdetails[0]['id_details']==$id_details){
            $c = DetailsBarang::where('id_details',$id_details)->first();
            $c->id_barang = $request->id_barang;
            $c->id_ukuran = $request->id_ukuran;
            $c->stok = $request->stok;
            $c->update();
            session([
                'success' => ['Details barang berhasil diubah'],
            ]);
            return back();
            }
        }else{
            if($cekdetails[0]['id_details']==$id_details){
                $c = DetailsBarang::where('id_details',$id_details)->first();
                $c->id_barang = $request->id_barang;
                $c->id_ukuran = $request->id_ukuran;
                $c->stok = $request->stok;
                $c->update();
                session([
                    'success' => ['Details barang berhasil diubah'],
                ]);
                return back();
                }else{
                    session([
                        'error' => ['Tidak dapat mengubah details barang '. $cekdetails[0]['id_barang']['id_ukuran'].' sudah ada'],
                    ]);
                    return back();
                }
          }
        }

    
        public function delete($id_details){
            DetailsBarang::where('id_details',$id_details)->delete();
            session([
                'success' => ['Details barang berhasil dihapus'],
            ]);
            return redirect('detailsbarang');
        }
    
}
