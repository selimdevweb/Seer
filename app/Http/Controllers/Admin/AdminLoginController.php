<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin_auth.login');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status','invalid login details');
        }

        return redirect()->route('admin.dashboard');
    }
}
