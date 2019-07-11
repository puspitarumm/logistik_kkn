<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        $data['admin'] = Admin::orderBy('id_admin','desc')->paginate(10);
        $data['admin_x'] = Admin::where('id_admin',10)->first();
		//dd($data['customer']);

		return view('users', $data);
    }
    public function create(Request $request)
    {
    	// dd($request->first_name);
    	// query insert dengan eloquent
    	$c = new Admin();
        $c->id_admin = $request->id_admin;
        $c->username = $request->username;
        $c->password = $request->password;
        $c->nama = $request->nama;
        $c->email = $request->email;
        $c->status = $request->status;
		$c->save();
    	return redirect('users');
    }
    public function update(Request $request, $id_admin){
    	$c = Admin::where('id_admin',$id_admin)->first();
		$c->username = $request->username;
        $c->password = $request->password;
        $c->nama = $request->nama;
        $c->email = $request->email;
        $c->status = $request->status;
		$c->update();
		return redirect('admin');
    }

    public function delete($id_admin){
    	Admin::where('id_admin',$id_admin)->delete();
        return redirect('users');
    }
}
