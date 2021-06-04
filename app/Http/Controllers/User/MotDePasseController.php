<?php

namespace App\Http\Controllers\User;

use DB;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MotDePasseController extends Controller
{
    public function getEmail()
    {
        return view('user-auth.mot-de-passe-oublie.index');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(60);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );

        Mail::send('user-auth.mot-de-passe-oublie.mail', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Modification du mot de passe');
        });

        return redirect('/')->with('message', 'Nous vous avons envoyé un email avec les étapes pour réinitialiser votre mot de passe. ');
    }
}
