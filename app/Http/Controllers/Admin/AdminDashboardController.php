<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        if (auth()->user()->role==1)
            return view('admin_auth.dashboard');
        else
            return redirect('/');
    }
}
