@extends('layouts.app')

@section('title')
    Seer | Panier
@endsection

@section('content')

    <div class="main__content">
        <h1>Votre panier</h1>

        <div class="main__tableau">
            <table>
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
                        <td scope="row">Colis secs {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</td>
                        <td scope="row">{{ \Cart::get($billetterie->id)->getPriceSum()}} €</td>
                        <td scope="row">
<<<<<<< HEAD
                            <form action="{{ route('cart.update', $billetterie->id) }}" class="user_shop">
                                @csrf
                                <input type="number" name="quantity" value="{{ $billetterie->quantity }}">
                                <input type="submit" value="Valider">
                            </form>
                        </td>
=======
                            <div class="main__form">
                                <form action="{{ route('cart.update', $billetterie->id) }}">
                                    @csrf
>>>>>>> 1637e357a82067dc54dc7045284c632c93dff85c

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
    </div>
@endsection



