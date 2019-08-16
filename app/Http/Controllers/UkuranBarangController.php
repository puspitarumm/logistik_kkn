<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UkuranBarang;
use App\Models\Barang;
use Validator;
use Illuminate\Support\Facades\Input;
use App\http\Requests;




class UkuranBarangController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
		$data['ukuran_barang'] = UkuranBarang::get();
		// return $data;
        // $data['ukuran_barang'] = UkuranBarang::orderBy('id_ukuran','desc')->paginate(10);
        // $data['ukuran_barang_x'] = UkuranBarang::where('id_ukuran',10)->first();
		//dd($data['customer']);

		return view('ukuranbarang', $data);
    
    }
    public function create(Request $request)
    {
    	$c = new UkuranBarang();
		$c->ukuran_barang = $request->ukuran_barang;
		$c->save();
    	return redirect('ukuranbarang');
    }
    public function update(Request $request, $id_ukuran){
    	//cek isi customer id
    	// dd($customer_id);
    	$c = UkuranBarang::where('id_ukuran',$id_ukuran)->first();
		$c->ukuran_barang = $request->ukuran_barang;
		$c->update();
		return redirect('ukuranbarang');
    }

    public function delete($id_ukuran){
    	UkuranBarang::where('id_ukuran',$id_ukuran)->delete();
        return redirect('ukuranbarang');
    }

    

}
