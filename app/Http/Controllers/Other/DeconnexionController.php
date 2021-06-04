<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeconnexionController extends Controller
{
    public function destroy(){

        if (auth()->user())
            auth()->logout();

        return redirect('/');
    }
}
