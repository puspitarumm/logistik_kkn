<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        $data['users'] = User::orderBy('id','desc')->get();
		//dd($data['customer']);

		return view('users', $data);
    }
    
    public function create(Request $request)
    {
    	// dd($request->first_name);
        // query insert dengan eloquent
        $this->validate($request,[
			'name' => 'required|string',
            'username' => 'required|string|max:15',
            'email' => 'required|string',
			'password' => 'required|min:8',
		]);

		if($request->has('password')) {
			$data = $request->except('password');
			$data['password'] = bcrypt($request->password);
		} else {
			$data = $request->except('password');
		}

		$user = User::create($data);

		// \Flash::success('User berhasil ditambah!');
    	// $c = new User();
        // $c->id = $request->id;
        // $c->name = $request->name;
        // $c->username = $request->username;
        // $c->email = $request->email;
        // $c->password = $request->password;
		// $c->save();
    	return redirect('users');
    }
    public function update(Request $request, $id){
    	$c = User::where('id',$id)->first();
        $c->name = $request->name;
        $c->username = $request->username;
        $c->email = $request->email;
        $c->password = $request->password;
		$c->update();
		return redirect('users');
    }

    public function delete($id){
    	User::where('id',$id)->delete();
        return redirect('users');
    }
}
