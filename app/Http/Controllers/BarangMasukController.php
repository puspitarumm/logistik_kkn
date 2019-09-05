<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Carbon;
use App\Models\Barang;
use App\Models\UkuranBarang;
use App\Models\DetailsBarang;
use DB;


class BarangMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
    $data['barang_masuk'] = BarangMasuk::orderBy('id_brg_masuk','desc')->with('barang','ukuran_barang')->get();
    $data['barang'] = Barang::all();
    $data['ukuran'] = UkuranBarang::all();
	return view('barangmasuk', $data);
    
    }
    // public function create(Request $request)
    // {
    // 	// dd($request->first_name);
    // 	// query insert dengan eloquent
    // 	$c = new BarangMasuk();
    //     $c->tgl_masuk = $request->tgl_masuk;
    //     $c->id_barang = $request->id_barang;
    //     $c->jml_masuk = $request->jml_masuk;
	// 	$c->save();
    // 	return redirect('barangmasuk');
    // }
    public function update(Request $request, $id_brg_masuk){
    	//cek isi customer id
        // dd($customer_id);
        $data['ukuran']=UkuranBarang::all();
        $data['barang']=Barang::all();
    	$c = BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->first();
        $c->id_barang = $request->id_barang;
        $c->jml_masuk = $request->jml_masuk;
        $c->id_ukuran = $request->id_ukuran;
		$c->update();
		return redirect('barangmasuk',$data);
    }

    public function delete($id_brg_masuk){
        
        $data['ukuran']=UkuranBarang::all();
        $data['barang']=Barang::all();
        
        $d_kurang=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->get();
        $kurang['stok']=intval($d_kurang[0]['stok'])-intval($value);
        $save=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->update($ukuran);
        BarangMasuk::where('id_brg_masuk',$id_brg_masuk)->delete();
        return redirect('barangmasuk',$data);
    }

    public function add_masuk(Request $request){
        $data['ukuran']=UkuranBarang::all();
        $data['barang']=Barang::all();
        return view('barangmasuk.tambah_barangmasuk',$data);
    }
    public function tambah_masuk(Request $request){
        $data['ukuran']=UkuranBarang::all();
        $data['barang']=Barang::all();
        return view('barangmasuk.tambah',$data);
    }

    public function tambah_save(Request $request){
        // return $request;
        $b_req=$request->except('_token');
        $barang=Barang::all();
        $ukuran=UkuranBarang::all(); 
        
        DB::beginTransaction();
        try{
            for($i=0;$i<count($barang);$i++){ 
                $leng[$i]=strlen($barang[$i]['nama_barang']);
                foreach($b_req as $key=>$value){
                    if(substr($key,0,$leng[$i])==str_replace('','_',$barang[$i]['nama_barang'])){
                        for($j=0;$j<count($ukuran);$j++){
                            if(substr($key,$leng[$i])==$ukuran[$j]['ukuran_barang'] && $value!=0){
                                 $data['id_barang']=$barang[$i]['id_barang'];
                                 $data['id_ukuran']=$ukuran[$j]['id_ukuran'];
                                 $data['jml_masuk']=intval($value);
                                return $data;
                                 $save=BarangMasuk::create($data);

                                 $d_tambah=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->get();
                                 $tambah['stok']=intval($d_tambah[0]['stok'])+intval($value);
                                 $save2=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->update($tambah);
                                break;
                                }
                        }
                    }
                }
            }
            DB::commit();
                session([
                    'success'  => ['Data Tersimpan'],
                ]);
                return redirect('barangmasuk');
            }catch (\Exception $e) {
                DB::rollback();
                return 'no';
            }
        }
        public function save(Request $request){
            // return $request;
            $b_req=$request->except('_token');
            $barang=Barang::all();
            $ukuran=UkuranBarang::all(); 
            DB::beginTransaction();
            try{
                
                for($i=0;$i<count($barang);$i++){
                    $leng[$i]=strlen($barang[$i]['nama_barang']);
                    foreach($b_req as $key=>$value){
                     if(substr($key,0,$leng[$i])==str_replace(' ','_',$barang[$i]['nama_barang'])){
                         for($j=0;$j<count($ukuran);$j++){
                             if(substr($key,$leng[$i])==$ukuran[$j]['ukuran_barang'] && $value!=null){
                
                                 $data['id_barang']=$barang[$i]['id_barang'];
                                 $data['id_ukuran']=$ukuran[$j]['id_ukuran'];
                                 $data['jml_masuk']=intval($value);
                                //  return $data;
                                $save=BarangMasuk::create($data);

                                $d_tambah=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->get();
                                $tambah['stok']=intval($d_tambah[0]['stok'])+intval($value);
                                $save2=DetailsBarang::where(['id_barang'=>$barang[$i]['id_barang'],'id_ukuran'=>$data['id_ukuran']=$ukuran[$j]['id_ukuran']])->update($tambah);
                             }
                         }
                     }
                    }
                }
                // return $counter;
                DB::commit();
                session([
                    'success'  => ['Data Tersimpan'],
                ]);
                return redirect('barangmasuk');
            }catch (\Exception $e) {
                DB::rollback();
                return 'no';
            }
        }
}
