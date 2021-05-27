@extends('layouts.app')

@section('title')
    Seer | Panier
@endsection

@section('content')
    <section>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div>
                <h1>Votre panier</h1>
            </div>
            <table class="admin_tableau user_card">
                <thead>
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
                            <form action="{{ route('cart.update', $billetterie->id) }}" class="user_shop">
                                @csrf
                                <input type="number" name="quantity" value="{{ $billetterie->quantity }}">
                                <input type="submit" value="Commander">
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection



