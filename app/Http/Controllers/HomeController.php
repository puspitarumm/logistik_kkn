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
use Charts;
use App\Charts\SampleChart;

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
        $barang_masuk = BarangMasuk::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart = Charts::database($barang_masuk, 'bar', 'highcharts')
                    ->title('Barang Masuk')
                    ->elementLabel('Total Barang Masuk')
                    ->dimensions(500, 400)
                    ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                    ->groupByMonth(date('Y'), true);
        return view('home',$data, ['masuk'=>$masuk,'keluar'=>$keluar,'chart' => $chart]);
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
                    ->dimensions(1000, 500)
                    ->colors(['red', 'green', 'blue', 'yellow', 'orange', 'cyan', 'magenta'])
                    ->groupByMonth(date('Y'), true);
       return view('dashboard', ['chart' => $chart]);
    }
    

    public function checksession()
    {
    	if(Auth::check()) {
    		return redirect('/home');
    	}

    	return view('auth.login');
    }
}