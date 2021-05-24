@extends('layouts.app')

@section('title')
    Seer | Panier
@endsection

@section('content')
    <section class="text-center">
        <h1>Votre panier</h1>
        <article class="bg-light">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($billetteries as $billetterie)
                    <tr >
                        <td scope="row">{{ $billetterie->name }}</td>
                        <td scope="row">{{ \Cart::get($billetterie->id)->getPriceSum()}}</td>
                        <td scope="row">
                            <form action="{{ route('cart.update', $billetterie->id) }}">
                                @csrf
                                <input type="number" name="quantity" value="{{ $billetterie->quantity }}">
                                <input type="submit" value="valider">
                            </form>
                        </td>

                        <td>
                            <a href="{{ route('cart.destroy', $billetterie->id) }}">Supprimer</a>
                        </td>

                    </tr>

                    @endforeach
                    <tr>
                        <td scope="row"><span>Quantité Totale</span></td>
                        <td>{{ \Cart::session(auth()->user()->id)->getTotalQuantity() }}</td>
                    </tr>
                    <tr>
                        <td scope="row"><span>Prix Total</span></td>
                        <td scope="row">{{ \Cart::session(auth()->user()->id)->getSubTotal() }} € </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
@endsection
