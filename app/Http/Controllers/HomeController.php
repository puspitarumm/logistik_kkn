<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetailsBarang;
use App\Models\UkuranBarang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Barang;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['detailsbarang'] = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->get();
        $data['barang']=Barang::all();
        $data['ukuran']=UkuranBarang::all();
        $data['listbarang'] = Barang::All();
        $data['stok']  = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->where('stok','<',50)->get();
    //    return $data['stok'];
        $masuk = BarangMasuk::count();
        $keluar = BarangKeluar::count();
        // return $masuk;
        return view('home',$data, ['masuk'=>$masuk,'keluar'=>$keluar]);
    }
    public function chart()
    {
        $months = Input::get('months', 5);
        $range = \Carbon\Carbon::now()->subMonths($months);
        $stats = DB::table('barang_masuk')
            ->where('created_at', '>=', $range)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->remember(1440) // Cache the data for 24 hours
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) jml_masuk from barang_masuk as value')
            ]);
        return $stats;
    }
    public static function getJumlahTamuJenisPerTahun(){
 
 
    	$tahun_awal = date('Y') - 5;
    	$tahun_akhir = date('Y');
 
    	$category = [];
 
    	$series[0]['name'] = 'dalam negeri';
    	$series[1]['name'] = 'luar negeri';
    	
 
 
    	$j = 0;
    	for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) { 
    		$category[] = $i;
 
    		$series[0]['data'][] = Self::where('jenis_tamu', '=', 'dalam negeri')->where('tgl_kunjungan','like', $i.'%')->count();
    		$series[1]['data'][] = Self::where('jenis_tamu', '=', 'luar negeri')->where('tgl_kunjungan','like', $i.'%')->count();
    		
    	}
 
 
    	return ['category' => $category, 'series' => $series];
 
 
    }


    public function checksession()
    {
    	if(Auth::check()) {
    		return redirect('/home');
    	}

    	return view('auth.login');
    }
}