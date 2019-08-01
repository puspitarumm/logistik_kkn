<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Periode;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Storage;

class DocumentController extends Controller
{
    public function index(){

        $data['document'] = Document::orderBy('id_dokumen','desc')->with('periode')->get();
        $data['periode'] = Periode::all();
        
		//dd($data['customer']);

		return view('dokumen', $data);
    
    }


   public function create(Request $request)
    {
        $this->validate($request, [
          'nama_dokumen' => 'required',
          'id_periode' => 'required',
          'dokumen' => 'required|mimes:pdf,jpeg,png,jpg,gif,svg|max:2048',
        ]);
            
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('dokumen');

        $path = $file->store('public/files');

        $file = Document::create([
            'nama_dokumen' => $request->nama_dokumen ?? $uploadedFile->getClientOriginalName(),
            'id_periode' => $request->id_periode,
            'dokumen' => $path,
            // 'dokumen' => $path
        ]);
        
        // $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'data_file';
		// $file->move($tujuan_upload,$nama_file);
 
	// 	Document::create([
    //   'nama_dokumen' => $request->nama_dokumen,
    //   'id_periode' => $request->id_periode,
	// 		'dokumen' => $nama_file,
	// 	]);
 
		return redirect()->back();
    }
  

        //   if ($validator->passes()) {
        //     $input = $request->all();
        //     $input['dokumen'] = time().'.'.$request->dokumen->getClientOriginalExtension();
        //     $request->gambar->move(public_path('dokumen'), $input['dokumen']);

        //     Dokumen::create($input);
        //     return response()->json(['success'=>'Berhasil']);
        //   }
    
        //   return response()->json(['error'=>$validator->errors()->all()]);
        
        
        // $c = new Document();
        // $c->nama_dokumen = $request->nama_dokumen;
        // $c->id_periode = $request->id_periode;
        // $c->dokumen = $request->dokumen;
		    // $c->save();
        // return redirect('dokumen');
        // }

    public function update(Request $request, $id_dokumen){
    	//cek isi customer id
    	// dd($customer_id);
    	$c = Document::where('id_dokumen',$id_dokumen)->first();
		$c->nama_dokumen = $request->nama_dokumen;
        $c->id_periode = $request->id_periode;
        $c->dokumen = $request->dokumen;
		$c->update();
		return redirect('dokumen');
    }

    public function delete($id_dokumen){
    	Document::where('id_dokumen',$id_dokumen)->delete();
        return redirect('dokumen');
    }
}
