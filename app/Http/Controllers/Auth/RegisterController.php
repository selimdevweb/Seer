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
            'nom'=>'required|max:10',
            'prenom'=>'required|max:10',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'rgpd'=>'required',
        ]);

       /*  User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'rgpd'=>$request->rgpd,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('user.dashboard'); */
    }
}
