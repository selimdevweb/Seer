<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        if (auth()->user() == null)
            return view('home.index');

        else if(auth()->user() !== null && auth()->user()->role == 1)
            return redirect('/tableau-de-bord');

        else
            return view('home.index');
    }
}
