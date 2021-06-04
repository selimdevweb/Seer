<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function destroy(){

        if (auth()->user()->role==0){
            auth()->logout();
            return redirect('/');
        }
        else
            return redirect('/admin.dashboard');
    }
}
