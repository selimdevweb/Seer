@extends('admin-auth.layouts.app')

@section('title')
    Admin | Tableau de bord
@endsection

@section('content')
    <div class="main__content">
        <h1>Tableau de bord</h1>

        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif

        <div class="d-flex justify-content-center">

            <div class="main__contentCard">
                @foreach ($billetteries as $billetterie)
                    <div class="card">
                        <div class="card-body admin_card">
                            <h5 class="card-title">Billetterie du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y H:i') }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Dernière mise à jour : </h6>
                            <p class="card-text">{{ $billetterie->nom }} {{ $billetterie->prenom }} le {{ \Carbon\Carbon::parse($billetterie->updated_at)->translatedFormat('d/m/Y') }}</p>
                            <div class="d-flex flex-row justify-content-around align-items-center">

                                <a href="{{ route('admin.billetterie.edit', $billetterie->id) }}" class="card-link admin_text_primary">Editer</a>

                                <form class="delete_buttons_form" action="{{ route('admin.billetterie.destroy', $billetterie->id) }}" method="post">
                                    @csrf

                                    @method('DELETE')

                                    <button class="delete_buttons admin_text_primary" type="submit">Supprimer</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="main__form admin_card">
                <form action="{{ route('admin.billetterie.store') }}" method="post">
                    @csrf

                    <input type="number" name="quantite" placeholder="Quantité">
                    <input type="number" name="prix" placeholder="Prix">
                    <input type="datetime-local" name="date" id="debut">
                    <input type="time" name="heure_fin" id="">
                    <input type="submit" class="admin_buttons_primary" value="Créér">
                </form>
            </div>
        </div>
    </div>
@endsection
