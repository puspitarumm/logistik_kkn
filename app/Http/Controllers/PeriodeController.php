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
    	$d = new periode();
        $d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $d->tgl_berakhir = date('Y-m-d', strtotime($request->tgl_berakhir));
		$d->save();
    	return redirect('periode');
    }
    public function update(Request $request, $id_periode){
        // return $request;
        // $d = Periode::where('id_periode',$id_periode)->first();
        $d=Periode::find($id_periode);
        $d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = date('Y-m-d', strtotime($request->tgl_mulai));
        $d->tgl_berakhir = date('Y-m-d', strtotime($request->tgl_berakhir));
        // return $d;
		$d->update();
		return redirect('periode');
    }

    public function delete($id_periode){
    	Periode::where('id_periode',$id_periode)->delete();
        return redirect('periode');
    }
}
