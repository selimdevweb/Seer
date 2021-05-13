<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('user_auth.inscription');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|max:255',
            'prenom'=>'required|max:255',
            'username'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'rgpd'=>'required',

        ]);
    }
}
