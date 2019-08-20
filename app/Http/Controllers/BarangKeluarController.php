<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\Mahasiswa;
use App\Models\DetailsBarang;
use App\Models\UkuranBarang;
use App\Models\Barang;
use App\Models\BarangAmbil;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use DB;
use PDF;
class BarangKeluarController extends Controller
{
        public function index(){
            $data['ambil']=BarangAmbil::with('mahasiswa')->get();
            // return $data['ambil'][0]['path'];
            return view('transaksi.barangkeluar', $data);
        }
        public function create(Request $request)
        {
            // dd($request->first_name);
            // query insert dengan eloquent
            $c = new BarangMasuk();
            $c->tgl_masuk = $request->tgl_masuk;
            $c->id_barang = $request->id_barang;
            $c->nama_barang = $request->nama_barang;
            $c->jumlah_masuk = $request->jumlah_masuk;
            $c->ukuran_barang = $request->ukuran_barang;
            $c->save();
            return redirect('barangmasuk');
        }
        public function update(Request $request, $id_brg_masuk){
            //cek isi customer id
            // dd($customer_id);
            $c = BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->first();
            $c->tgl_masuk = $request->tgl_masuk;
            $c->id_barang = $request->id_barang;
            $c->nama_barang = $request->nama_barang;
            $c->jumlah_masuk = $request->jumlah_masuk;
            $c->ukuran_barang = $request->ukuran_barang;
            $c->update();
            return redirect('barangmasuk');
        }
    
        public function delete($id_brg_masuk){
            BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->delete();
            return redirect('barangmasuk');
        }
        
        public function add_keluar(){
            return view('transaksi.tambah_keluar');
        }

        public function add_create(Request $request){
            $niu=$request->except('_token');
            $data['mahasiswa']=Mahasiswa::find($request)->first();
            $data['ukuran']=UkuranBarang::all();
            $data['barang']=Barang::all();
            if(empty($data['mahasiswa'])){
                session([
                    'error'  => ['Mahasiswa tidak terdaftar'],
                ]);
                return back();
            }
            return view('transaksi.databarang',$data);
        }

        public function save_create(Request $request){
            // return $request;
            $b_req=$request->except('_token','niu','lokasi');
            $barang=Barang::all();
            $ukuran=UkuranBarang::all();
            DB::beginTransaction();
            try{
                $id_barang_ambil=BarangAmbil::where('niu',$request['niu'])->get();
                // return $id_barang_ambil;
                if($id_barang_ambil){
                    $c = new BarangAmbil();
                    $c->niu = $request->niu;
                    $c->kode_lokasi = $request->lokasi;
                    $c->save();
                    $id_barang_ambil=BarangAmbil::where('niu',$request['niu'])->get();
                }
                // return $id_barang_ambil;
                for($i=0;$i<count($barang);$i++){
                    $leng[$i]=strlen($barang[$i]['nama_barang']);
                    foreach($b_req as $key=>$value){
                     if(substr($key,0,$leng[$i])==str_replace(' ','_',$barang[$i]['nama_barang'])){
                         for($j=0;$j<count($ukuran);$j++){
                             if(substr($key,$leng[$i])==$ukuran[$j]['ukuran_barang'] && $value!=0){
                                 $data['id_barang_ambil']=$id_barang_ambil[0]['id_ambil'];
                                 $data['id_barang']=$barang[$i]['id_barang'];
                                 $data['id_ukuran']=$ukuran[$j]['id_ukuran'];
                                 $data['jml_keluar']=intval($value);
                                //  return $data;
                                 $save=BarangKeluar::create($data);

                                 $d_kurang=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->get();
                                 if(count($d_kurang)!=0){
                                    $kurang['stok']=intval($d_kurang[0]['stok'])-intval($value);
                                    if ($kurang['stok']<0) {
                                        session([
                                            'error'  => ['Stok '.$barang[$i]['nama_barang'].' Kurang'],
                                        ]);  
                                        return redirect('barangkeluar'); 
                                    } else {
                                        $save2=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->update($kurang);    
                                    }
                                 }else{
                                    session([
                                        'error'  => [$barang[$i]['nama_barang'].' tidak memiliki Stok'],
                                    ]);  
                                    return redirect('barangkeluar');
                                 }
                                break;
                             }
                         }
                     }
                    }
                }
                // return 0;
                DB::commit();
                session([
                    'success'  => ['Data Tersimpan'],
                ]);
                return redirect('barangkeluar');
            }catch (\Exception $e) {
                DB::rollback();
                return 'no';
            }
            
        }

        public function printPdf(Request $request){
            $data['mahasiswa']=Mahasiswa::where('kode_lokasi',$request['lokasi'])->where('id_periode',$request['periode'])->with('periode')->get();
            $pdf = PDF::loadView('transaksi.mahasiswa_pdf', $data);
            return $pdf->download('Bukti Pengambilan.pdf');
        }

        public function uploadBukti(Request $request){
            // return $request;
            $file = $request->file('dokumen');
            $path['path'] = $file->store('public/files');
            $file = BarangAmbil::where('id_ambil',$request['id'])->update($path);
            if($file!=0){
                session([
                    'success'  => ['Unggah berhasil']
                ]);
            }else{
                session([
                    'error'  => ['Unggah gagal']
                ]);
            }
            return redirect()->back();
        }

        public function deleted($id){
            DB::beginTransaction();
            try{
                Barangkeluar::where('id_barang_ambil',$id)->delete();
                BarangAmbil::where('id_ambil',$id)->delete();
                DB::commit();
                session([
                    'success'  => ['Data berhasil dihapus'],
                ]);
            }catch (\Exception $e) {
                DB::rollback();
                session([
                    'error'  => ['Data Gagal Terhapus'],
                ]);
            }
            return redirect()->back();
        }

        public function hapus_unggahan($id){
            DB::beginTransaction();
            try{
                $data = BarangAmbil::where('id_ambil',$id)->first();
                $data->path = null;
                $data->update(); 
                DB::commit();
                session([
                    'success'  => ['Unggahan berhasil dihapus'],
                ]);
            }catch (\Exception $e){
                DB::rollback();
                session([
                    'error'=> ['Unggahan gagal dihapus'],
                ]);
            }
            return redirect()->back();
        }

    
}