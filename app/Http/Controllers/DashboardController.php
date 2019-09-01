<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {
    //     return view('dashboard');
    // }
    public function checksession()
    {
    	if(Auth::check()) {
    		return redirect('/dashboard');
        }

    	return view('auth.login');
    }
    public static function index(){
 
    	$tahun_awal = date('Y') - 4;
    	$tahun_akhir = date('Y');
 
        $categories = [];
        $series= [];
        $data=[];
 
        $nama_barang=\App\Models\Barang::all();
        
        foreach($nama_barang as $m){
            $series[] = $m->nama_barang;
        }
        // return $series;
        // foreach($series as $m){

        // }
        // $series['total'] = '';
        
        // $series['test']=BarangKeluar::with('barang')->get('id_barang');
        // $series['total']=DB::select(DB::raw('
        //    SELECT
        //    (select sum(jml_keluar)) as keluar
        //    from barang_keluar 
        // '));

    	$j = 0;
    	for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) { 
            $categories[] = $i;
 
            // $series[]['data'] = BarangMasuk::where('created_at','like', $i.'%')->count();
            // $series[1]['data'][] = BarangKeluar::where('created_at','like', $i.'%')->count();
        //     $data[] = BarangKeluar::selectRaw('SUM(jml_keluar) as qt, id_barang as id_barang')
        // ->groupBy('id_barang')->with('barang')->get();
        // // $series[2]['data'][] = BarangKeluar::selectRaw('SUM(jml_keluar) as qt, id_barang as id_barang')
        // // ->groupBy('id_barang')->with('barang')->get();
        // // return $series['total'];
        //     // $series[1]['data'][] = DB::table('barang_keluar')->whereBetween('created_at',[date('Y-m-d 00:00:01'),date('Y-m-d 23:59:59')])->count();
            
    		
    	}
        // return $series[1];
    	return view('dashboard',['nama_barang'=>$nama_barang,'series' => $series,'categories' => $categories,]);
 
 
    }
}
