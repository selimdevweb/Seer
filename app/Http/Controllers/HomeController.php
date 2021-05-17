<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        if (auth()->user()==null) {
            return view('index');
        }
        else if(auth()->user()!==null && auth()->user()->role==1 ){
            return redirect('/admin-dashboard');
        }
        else{
            return view('index');
        }
    }
}
