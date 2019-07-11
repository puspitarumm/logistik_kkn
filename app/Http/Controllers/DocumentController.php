<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class DocumentController extends Controller
{
    public function index(){

        $data['document'] = Document::orderBy('id_dokumen','desc')->paginate(10);
        $data['document_X'] = Document::where('id_dokumen',10)->first();
		//dd($data['customer']);

		return view('dokumen', $data);
    
    }

   public function create(Request $request)
    {
    	// dd($request->first_name);
    	// query insert dengan eloquent
    	$c = new Document();
        $c->nama_dokumen = $request->nama_dokumen;
        $c->nama_periode = $request->nama_periode;
        $c->dokumen = $request->dokumen;
		$c->save();
    	return redirect('dokumen');
    }
    public function update(Request $request, $id_dokumen){
    	//cek isi customer id
    	// dd($customer_id);
    	$c = Document::where('id_dokumen',$id_dokumen)->first();
		$c->nama_dokumen = $request->nama_dokumen;
        $c->nama_periode = $request->nama_periode;
        $c->dokumen = $request->dokumen;
		$c->update();
		return redirect('dokumen');
    }

    public function delete($id_dokumen){
    	Document::where('id_dokumen',$id_dokumen)->delete();
        return redirect('dokumen');
    }
}
