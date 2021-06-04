<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\inscriptionMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    public function index(){
        return view('user-auth.inscription');
    }

    public function store(Request $request){

        $this->validate($request, [
            'nom'=>'required|max:255',
            'prenom'=>'required|max:255',
            'email'=>'required|email|max:255',
            'password'=>'required|confirmed',
            'rgpd'=>'required',
        ]);

        User::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'rgpd'=>$request->rgpd,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));
        Mail::to(Auth()->user())->send(new inscriptionMail);

        return redirect()->route('user.profil.index');
    }
}
