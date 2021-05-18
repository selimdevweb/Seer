<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    public function destroy(){

        if (auth()->user()->role==1)
            auth()->logout();

        return redirect('/');
    }
}
