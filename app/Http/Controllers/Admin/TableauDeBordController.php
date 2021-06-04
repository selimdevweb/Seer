<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TableauDeBordController extends Controller
{
    public function index(){
        if (auth()->user()->role==1){

            $billetteries = DB::table('users')
            ->join('billetteries', 'billetteries.admin_id', '=', 'users.id')
            ->orderBy('billetteries.updated_at', 'DESC')
            ->take(1)
            ->get();

            return view('admin-auth.tableau-de-bord')->with('billetteries', $billetteries);
        }
        else
            return redirect('/');
    }
}
