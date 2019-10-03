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
use App\Models\Document;
use DB;
use Charts;
use App\Charts\SampleChart;
use User;

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
        $data['stok']  = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->where('stok','<',100)->get();
    //    return $data['stok'];
        $masuk = BarangMasuk::count();
        $keluar = BarangKeluar::count();
        $dokumen = Document::count();
        
        $barang_masuk = BarangMasuk::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart = Charts::database($barang_masuk, 'bar', 'highcharts')
                    ->title('Barang Masuk')
                    ->elementLabel('Total Barang Masuk')
                    ->dimensions(500, 400)
                    ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                    ->groupByMonth(date('Y'), true);
        return view('home',$data, ['masuk'=>$masuk,'keluar'=>$keluar,'dokumen'=>$dokumen,'chart' => $chart]);
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
    public function charts(){
        $barang_masuk = BarangMasuk::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart = Charts::database($barang_masuk, 'bar', 'highcharts')
                    ->title('Barang Masuk')
                    ->elementLabel('Total Barang Masuk')
                    ->dimensions(1000, 1000)
                    ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                    ->groupByMonth(date('Y'), true);
       return view('dashboard', ['chart' => $chart]);
    }

    public static function charttahun(){
 
    	$tahun_awal = date('Y') - 4;
    	$tahun_akhir = date('Y');
 
        $categories = [];
        $series[0]['name'] = 'barang masuk';
        $series[1]['name'] = 'barang keluar';
        
    	$j = 0;
    	for ($i=$tahun_awal; $i <= $tahun_akhir ; $i++) { 
            $categories[] = $i;
 
            $series[0]['data'][] = BarangMasuk::where('created_at','like', $i.'%')->count();
            $series[1]['data'][] = BarangKeluar::where('created_at','like', $i.'%')->count();
            $data[] = BarangKeluar::selectRaw('SUM(jml_keluar) as qt, id_barang as id_barang')
        ->groupBy('id_barang')->with('barang')->get();
    	}
        // return $series[1];
    	return view('dashboard',['series' => $series,'categories' => $categories,]);
    }

    public function checksession()
    {
    	if(Auth::check()) {
    		return redirect('/home');
    	}

    	return view('auth.login');
    }
}