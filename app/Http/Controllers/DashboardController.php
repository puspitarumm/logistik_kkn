<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('dashboard');
    }
    public function checksession()
    {
    	if(Auth::check()) {
    		return redirect('/dashboard');
        }

    	return view('auth.login');
    }
}
