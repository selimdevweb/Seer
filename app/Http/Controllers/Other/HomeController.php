<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        if(auth()->user() !== null && auth()->user()->role == 1)
            return redirect('/tableau-de-bord');

        else
            return view('other.index');
    }
}
