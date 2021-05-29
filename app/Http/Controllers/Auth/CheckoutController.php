<?php

namespace App\Http\Controllers\Auth;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $billetteries = \Cart::session(auth()->user()->id)->getContent();
        return view('user_auth.checkout')->with('billetteries',$billetteries);
    }


    public function makePayment(Request $request, $id)
    {

        $billetteries = \Cart::session(auth()->user()->id)->getContent();

        foreach($billetteries as $billetterie){
            $prix = $billetterie->price * \Cart::session(auth()->user()->id)->getTotalQuantity();
        }
        Stripe::setApiKey('sk_test_51Iuxs5G7x6GsCgKuEb0imU0BEwom4saWBDQ4VXYgOadumdkdVzg34zNfBVT3ZwJHgRYPQ1DPOcLBxJv8oh50eIJT00qWnQVWAU');
        Charge::create ([
                "amount" => $prix * 100,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Make payment and chill."
        ]);

        \Cart::session(auth()->user()->id)->remove($id);

        return redirect()->route('user.dashboard')->with('message', 'Votre paiement de '.$prix . '€ est bien enregistré');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
