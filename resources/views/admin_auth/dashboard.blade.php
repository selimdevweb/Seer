@extends('layouts_admin.app')

@section('title')
    Admin - Dashboard
@endsection

@section('content')
    <h1>Admin</h1>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    <div class="d-flex col justify-content-center align-items-center admin_dashboard">

        <div class="admin_dashboard_card">
            @foreach ($billetteries as $billetterie)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Billeterie du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y H:i') }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Auteur : {{ $billetterie->nom }} {{ $billetterie->prenom }}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="d-flex flex-row justify-content-left align-items-center">
                        <a href="{{ route('admin.billetterie.edit', $billetterie->id) }}" class="card-link">Editer</a>
                        <form class="delete_buttons_form" action="{{ route('admin.billetterie.destroy', $billetterie->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="delete_buttons" type="submit">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="admin_dashboard_card">
            <div>
                <form action="{{ route('admin.billetterie.store') }}" method="post" class="form-group" >
                    @csrf
                    <input type="number" name="quantite" placeholder="Quantité">
                    <input type="number" name="prix" placeholder="Prix">
                    <input type="datetime-local" name="date" id="debut">
                    <input type="time" name="heure_fin" id="">
                    <input type="submit" value="Créér">
                </form>
            </div>
        </div>

    </div>
@endsection
