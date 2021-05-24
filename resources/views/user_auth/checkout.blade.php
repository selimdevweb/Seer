@extends('layouts.app')

@section('title')
    Seer | Checkout
@endsection

@section('content')
    <section class="text-center">
        <h1>Page de paiement</h1>
        <article class="bg-light">
            @foreach ($billetteries as $billetterie)
                <div>
                    <h2>Gros Colis</h2>
                    <span>Prix : {{ $billetterie->prix }}€</span>
                    <p>Quantité(s) : {{ $billetterie->quantite }}</p>
                </div>
                <div>
                    <p>Stripe...</p>
                    <button>Payer</button>
                </div>
            @endforeach
        </article>
    </section>
@endsection
