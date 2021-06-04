<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function index(){
        return view('other.connexion');
    }

    public function store(Request $request){

        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'), $request->remember))
            return back()->with('status','Identifiants ou mot de passe invalides');

        return redirect()->route('user.profil.index');
    }
}
