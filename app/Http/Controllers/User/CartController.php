<?php

namespace App\Http\Controllers;

use App\Models\Billetterie;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function add(Billetterie $billetterie){
        // add the product to cart
        \Cart::session(auth()->user()->id)->add(array(
            'id' => $billetterie->id,
            'name' => $billetterie->titre,
            'price' => $billetterie->prix,
            'quantity' =>1,
            'attributes' => array(),
            'associatedModel' => $billetterie,
        ));
        return /* back(); */redirect()->route('index.cart');
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
        ]
        );
        return \redirect()->route('user.checkout');
    }
}
