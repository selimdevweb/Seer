<?php

namespace App\Http\Controllers\User;

use App\Models\Billetterie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanierController extends Controller
{
    public function add(Billetterie $billetterie){

        \Cart::session(auth()->user()->id)->add(array(
            'id' => $billetterie->id,
            'name' => $billetterie->titre,
            'price' => $billetterie->prix,
            'quantity' =>1,
            'attributes' => array(),
            'associatedModel' => $billetterie,
        ));

        return redirect()->route('user.panier.index');
    }

    public function index(){
        $billetteries = \Cart::session(auth()->user()->id)->getContent();
        return view('user-auth.panier')->with('billetteries',$billetteries);
    }

    public function destroy($id){
        \Cart::session(auth()->user()->id)->remove($id);
        return back();
    }

    public function update($id){
        \Cart::session(auth()->user()->id)->update($id,[

            'quantity' => array(
                'relative' => false,
                'value' => request('quantity')
            )
        ]);

        $token = Str::random(60);
        return \redirect()->route('user.paiement.index', $token)->with('token', $token);
    }
}
