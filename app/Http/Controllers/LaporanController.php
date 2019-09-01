<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailsBarang;
use App\Models\UkuranBarang;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use PDF;
use Carbon\Carbon;


class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['detailsbarang'] = DetailsBarang::orderBy('id_details','desc')->with('barang','ukuran_barang')->get();
        $data['barang'] = Barang::all();  
        $data['ukuran_barang'] = UkuranBarang::all();
        return view('laporan.stokbarang', $data);
        
        }

        public function cetak_pdf_stok()
        {
            $data=DetailsBarang::all();
            $tgl_cetak = Carbon::Now();
            $pdf = PDF::loadview('laporan.stok_cetak_pdf',array('data'=>$data,'tgl_cetak'=>$tgl_cetak));
            return $pdf->stream();
        }
        public function printPdf(Request $request){
        //    return $request;
        $start_date = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:01';
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d') . ' 23:59:59';

       //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
       $data['barang_masuk'] = BarangMasuk::whereBetween('created_at', [$start_date, $end_date])->get();
        //    return $data['barang_masuk'];
           $pdf = PDF::loadView('laporan.brg_masuk_pdf', $data);
           return $pdf->stream();

        }
        public function lap_brg_masuk(Request $request){
            $barang_masuk = BarangMasuk::orderBy('created_at', 'DESC')->get();

            if (!empty($request->start_date) && !empty($request->end_date)) {
                //MAKA DI VALIDASI DIMANA FORMATNYA HARUS DATE
                $this->validate($request, [
                    'start_date' => 'nullable|date',
                    'end_date' => 'nullable|date'
                ]);
    
                 $start_date = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:01';
                 $end_date = Carbon::parse($request->end_date)->format('Y-m-d') . ' 23:59:59';
    
                //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
                $barang_masuk = BarangMasuk::whereBetween('created_at', [$start_date, $end_date])->get();
                // $pdf = PDF::loadView('laporan.brg_masuk_pdf', array('barang_masuk'=>$barang_masuk,'start_date'=>$start_date,'end_date'=>$end_date));
                // return $pdf->stream();
            } 

                else {
                //JIKA START DATE & END DATE KOSONG, MAKA DI-LOAD 10 DATA TERBARU
                $barang_masuk = BarangMasuk::take(10)->skip(0)->get();
                }
            return view('laporan.lap_brg_masuk',['barang_masuk' => $barang_masuk]);
            
        }

        public function barangmasukPdf(){
            if (!empty($request->start_date) && !empty($request->end_date)) {
                //MAKA DI VALIDASI DIMANA FORMATNYA HARUS DATE
                $this->validate($request, [
                    'start_date' => 'nullable|date',
                    'end_date' => 'nullable|date'
                ]);
    
                 $start_date = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:01';
                 $end_date = Carbon::parse($request->end_date)->format('Y-m-d') . ' 23:59:59';
    
                //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
                $barang_masuk = BarangMasuk::whereBetween('created_at', [$start_date, $end_date])->get();
            
            $pdf = PDF::loadView('laporan.brg_masuk_pdf', array('barang_masuk'=>$barang_masuk,'start_date'=>$start_date,'end_date'=>$end_date));
            return $pdf->stream();
        }
    }


        public function lap_brg_keluar(Request $request){
            $barang_keluar = BarangKeluar::orderBy('created_at', 'DESC')->with('barang','ukuran_barang')->get();

            if (!empty($request->start_date) && !empty($request->end_date)) {
            //MAKA DI VALIDASI DIMANA FORMATNYA HARUS DATE
            $this->validate($request, [
                'start_date' => 'nullable|date',
                'end_date' => 'nullable|date'
            ]);

             $start_date = Carbon::parse($request->start_date)->format('Y-m-d') . ' 00:00:01';
             $end_date = Carbon::parse($request->end_date)->format('Y-m-d') . ' 23:59:59';

            //DITAMBAHKAN WHEREBETWEEN CONDITION UNTUK MENGAMBIL DATA DENGAN RANGE
            $barang_keluar = BarangKeluar::whereBetween('created_at', [$start_date, $end_date])->get();
            }
            else {
            //JIKA START DATE & END DATE KOSONG, MAKA DI-LOAD 10 DATA TERBARU
            $barang_keluar = BarangKeluar::take(10)->skip(0)->get();
            }

            return view('laporan.lap_brg_keluar', [
                'barang_keluar' => $barang_keluar,
            ]);
    }
}
    



    
       
    
