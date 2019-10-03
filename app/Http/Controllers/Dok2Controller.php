<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\Document;
use App\Models\Periode;
use Illuminate\Http\Request;

class Document2Controller extends Controller
{
    public function uploadFile()
    {
        $uploadFile = Document::get();
        $data['periode'] = Periode::all();
        return view('dokumen2',compact('uploadFile'));
    }

    public function StoreUploadFile(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'nama_dokumen' => 'required',
        'id_periode' => 'required',
        'dokumen' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $input['dokumen'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('dokumen'), $input['dokumen']);

        Upload_file::create($input);
        return response()->json(['success'=>'Berhasil']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }
}

