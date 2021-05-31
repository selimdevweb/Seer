@extends('layouts.app')

@section('title')
    Seer | Panier
@endsection

@section('content')

    <div class="main__content">
        <h1>Votre panier</h1>
        <table>
            <thead></thead>
                <tr>
                    <th>Produit(s)</th>
                    <th>Prix</th>
                    <th>Quantité(s)</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($billetteries as $billetterie)
                <tr>
                    <td scope="row">{{ $billetterie->name }}</td>
                    <td scope="row">{{ \Cart::get($billetterie->id)->getPriceSum()}} €</td>
                    <td scope="row">
                        <div class="main__form">
                            <form action="{{ route('cart.update', $billetterie->id) }}">
                                @csrf

                                <input type="number" name="quantity" value="{{ $billetterie->quantity }}">
                                <button type="submit">Commander</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



