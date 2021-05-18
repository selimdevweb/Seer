<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(){
        if (auth()->user()->role==1){

            $billetteries = DB::table('billetteries')
            ->orderBy('billetteries.updated_at', 'DESC')
            ->join('users', 'users.id', '=', 'billetteries.admin_id')
            ->take(1)
            ->get();

            /* $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get(); */

            return view('admin_auth.dashboard')->with('billetteries', $billetteries);
        }
        else
            return redirect('/');
    }
}
