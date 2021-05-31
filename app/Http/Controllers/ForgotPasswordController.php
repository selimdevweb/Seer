<?php
namespace App\Http\Controllers;

use DB;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function getEmail()
  {
     return view('forgot_password.index');
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

      Mail::send('forgot_password.verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

    return redirect('/')->with('message', 'UN mail de réinitialisation vous a été envoyé merci de consulter votre boite mail');
  }
}
