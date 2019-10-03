<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Carbon\Carbon;

class PeriodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $data['periode'] = Periode::orderBy('id_periode','desc')->get();
        foreach($data['periode'] as $item){
            $item['date_mulai']=date('d F Y', strtotime($item['tgl_mulai']));
            $item['date_berakhir']=date('d F Y', strtotime($item['tgl_berakhir']));
        }
        // return $data['periode'];
        return view('periode', $data);
    
    }
    public function create(Request $request)
    {
        $request->validate([
            'tahun'    =>  'numeric',
        ]);
        $validator = Validator::make($request->all(), [
            'tahun'=>'numeric'
            ]);
            if ($validator->fails()) {                      
                return back()
                           ->withErrors($validator)
                   ->withInput();                      
                }        
        $cekperiode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();
        // return $cekperiode;
        if(count($cekperiode)==0){
    	$d = new periode();
        $d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $d->tgl_berakhir = date('Y-m-d', strtotime($request->tgl_berakhir));
        $d->save();
        session([
            'success' => ['Periode berhasil ditambahkan'],
        ]);
    	return redirect('periode');
    }else{
        session([
          'error' => ['Periode sudah ada'],
      ]);
      return back();
      }
    }

    public function update(Request $request, $id_periode){
         $request->validate([
            'tahun'    =>  'numeric',
        ]);
        $validator = Validator::make($request->all(), [
            'tahun'=>'numeric'
            ]);
            if ($validator->fails()) {                      
                return back()
                           ->withErrors($validator)
                   ->withInput();                      
        }   
        $cekperiode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();
        // dd($cekperiode);
        if(count($cekperiode)==0){
            if($cekperiode[0]['id_periode']==$id_periode){
                    $d = Periode::where('id_periode',$id_periode)->first();
        $d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $d->tgl_berakhir = date('Y-m-d', strtotime($request->tgl_berakhir));
        // return $d;
        $d->update();
        session([
            'success' => ['Details barang berhasil diubah'],
        ]);
        return back();
        }
    }else{
		if($cekperiode[0]['id_periode']==$id_periode){
            $d = Periode::where('id_periode',$id_periode)->first();
            $d->nama_periode = $request->nama_periode;
            $d->tahun = $request->tahun;
        $d->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $d->tgl_berakhir = date('Y-m-d', strtotime($request->tgl_berakhir));
            $d->update();
            session([
                'success' => ['Periode berhasil diubah'],
            ]);
            return back();
            }else{
                session([
                    'error' => ['Tidak dapat mengubah periode sudah ada'],
                ]);
                return back();
            
            }
        }
    }
    
       

    public function delete($id_periode){
        Periode::where('id_periode',$id_periode)->delete();
        session([
            'success' => ['Berhasil menghapus periode'],
        ]);
        return back();
        return redirect('periode');

    }
}
