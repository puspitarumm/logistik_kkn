<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class PeriodeController extends Controller
{
    public function index(){

        $data['periode'] = Periode::orderBy('id_periode','desc')->paginate(5);
        $data['periode_x'] = Periode::where('id_periode',10)->first();
		return view('periode', $data);
    
    }
    public function create(Request $request)
    {
    	$d = new periode();
        $d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = $request->tgl_mulai;
        $d->tgl_berakhir = $request->tgl_berakhir;
		$d->save();
    	return redirect('periode');
    }
    public function update(Request $request, $id_periode){
    	$d = Periode::where('id_periode',$id_periode)->first();
		$d->nama_periode = $request->nama_periode;
        $d->tahun = $request->tahun;
        $d->tgl_mulai = $request->tgl_mulai;
        $d->tgl_berakhir = $request->tgl_berakhir;
		$d->update();
		return redirect('periode');
    }

    public function delete($id_periode){
    	Periode::where('id_periode',$id_periode)->delete();
        return redirect('periode');
    }
}
