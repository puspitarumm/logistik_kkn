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
        $ceknama = User::where(['username'=>$request['username']])->get();
            if(count($ceknama)==0){
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
        session([
            'success' => ['user berhasil ditambahkan'],
        ]);
        return redirect('users');
            }else{
                session([
                    'error' => ['Tidak dapat menambah user '. $ceknama[0]['username'].' sudah ada'],
                ]);
                return redirect('users');
            }
    }
    public function update(Request $request, $id){
        $this->validate($request,[
			'name' => 'required|string',
            'username' => 'required|string|max:15',
            'email' => 'required|string',
			'password' => 'required|min:8',
		]);
        $c = User::where('id',$id)->first();
        $ceknama = User::where(['username'=>$request['username']])->get();
        // return $ceknama;
            if(count($ceknama)==0){
                if($ceknama[0]['id']==$id){
        $c->name = $request->name;
        $c->username = $request->username;
        $c->email = $request->email;
        $c->password = $request->password;
        $c->update();
        session([
            'success' => ['user berhasil diubah'],
        ]);
        return redirect('users');
            }}else{
                if($ceknama[0]['id']==$id){
                    $c->name = $request->name;
                    $c->username = $request->username;
                    $c->email = $request->email;
                    $c->password = $request->password;
                    $c->update();
                    session([
                        'success' => ['user berhasil diubah'],
                    ]);
                    return redirect('users');
                    }else{
                        session([
                            'error' => ['Tidak dapat menambah user '. $ceknama[0]['username'].' sudah ada'],
                        ]);
                        return redirect('users');
                    }
            }
    }

    public function delete($id){
        User::where('id',$id)->delete();
        session([
            'success' => ['user berhasil dihapus'],
        ]);
        return redirect('users');
    }
}
