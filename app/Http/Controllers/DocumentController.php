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
use DB;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        $data['document'] = Document::orderBy('id_dokumen','desc')->with('periode')->get();
        $data['tahun'] = json_decode(DB::table('periode')->distinct()->get('tahun'),true);
       
        
		//dd($data['customer']);
		return view('dokumen', $data);
    
    }


   public function create(Request $request)
    {
        
        $this->validate($request, [
          'nama_dokumen' => 'required',
          'dokumen' => 'required|mimes:pdf,jpeg,png,jpg|max:3000',
        ]);
            
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('dokumen');

        // $path = $file->store('public/file');

        // $file = Document::create([
        //     'nama_dokumen' => $request->nama_dokumen ?? $uploadedFile->getClientOriginalName(),
        //     'id_periode' => $request->id_periode,
        //     'dokumen' => $path,
        //     // 'dokumen' => $path
        // ]);
        
        $nama_file = time()."_".$file->getClientOriginalName();

        //isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        
        $id_periode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();
        // return $id_periode;
            
        if(count($id_periode)==0){
            session([
                'error' => ['Periode tidak tersedia'],
            ]);
            return back();
        }
		Document::create([
      'nama_dokumen' => $request->nama_dokumen,
      'id_periode' => $id_periode[0]['id_periode'],
			'dokumen' => $nama_file,
		]);
 
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
        $id_periode = Periode::where(['nama_periode'=>$request->nama_periode,'tahun'=>$request->tahun])->get();
        $c = Document::find($id_dokumen);
        $c->nama_dokumen = $request->nama_dokumen;
        $c->id_periode = $id_periode[0]->id_periode;

        if($request->hasFile('dokumen')){
            $file = $request->file('dokumen');
            $extention = $file->getClientOriginalExtension();
            $nama_file = time()."_".$file->getClientOriginalName();

        //isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);

    	
        }
		$c->update();
		return redirect('dokumen');
    }

    

    public function delete($id_dokumen){
    	Document::where('id_dokumen',$id_dokumen)->delete();
        return redirect('dokumen');
    }
}
