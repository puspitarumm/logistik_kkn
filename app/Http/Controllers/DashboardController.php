<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Charts;
use App\Charts\SampleChart;
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
        $series[0]['name'] = 'barang masuk';
        $series[1]['name'] = 'barang keluar';
        
 
    
        
       
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
 
            $series[0]['data'][] = BarangMasuk::where('created_at','like', $i.'%')->count();
            $series[1]['data'][] = BarangKeluar::where('created_at','like', $i.'%')->count();
            $data[] = BarangKeluar::selectRaw('SUM(jml_keluar) as qt, id_barang as id_barang')
        ->groupBy('id_barang')->with('barang')->get();
        // $series[2]['data'][] = BarangKeluar::selectRaw('SUM(jml_keluar) as qt, id_barang as id_barang')
        // ->groupBy('id_barang')->with('barang')->get();
        // return $series['total'];
            // $series[1]['data'][] = DB::table('barang_keluar')->whereBetween('created_at',[date('Y-m-d 00:00:01'),date('Y-m-d 23:59:59')])->count();
            
    		
    	}
        // return $series[1];
    	return view('dashboard',['series' => $series,'categories' => $categories,]);
 
 
    
}
        public function charts(){
            $barang_masuk = BarangMasuk::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
            $chart = Charts::database($barang_masuk, 'bar', 'highcharts')
                        ->title('Barang Masuk')
                        ->elementLabel('Total Barang Masuk')
                        ->dimensions(1000, 500)
                        ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                        ->groupByMonth(date('Y'), true);
            // $chart = Charts::multi('bar', 'material')
    // ->title("My Cool Chart")
    // ->dimensions(1000, 500) // Width x Height
    // ->template("material")
    // ->dataset('Barang Masuk', [5,20,100])
    // ->dataset('Barang Keluar', [15,30,80])
    // ->dataset('Element 3', [25,10,40])
    // ->labels(['One', 'Two', 'Three']);
           return view('dashboard', ['chart' => $chart]);
        }
}