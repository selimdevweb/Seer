<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('user-auth.connexion');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        /* Optimisation  role*/
        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
            return back()->with('status','Identifiants ou mot de passe invalides');

        return redirect()->route('user.profil.index');
    }
}
