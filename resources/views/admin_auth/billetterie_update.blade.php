@extends('layouts_admin.app')

@section('title')
    Admin | Billetterie du : {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}
@endsection

@section('content')
    <h1>Billetterie du : {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h1>
    <div class="d-flex justify-content-center">
        <div class="admin_card_form admin_card">
            <form action="{{ route('admin.billetterie.update', $billetterie->id) }}" method="post">
                @csrf

                <input type="number" name="quantite" placeholder="Quantité" value="{{ $billetterie->quantite }}">
                <input type="number" name="prix" placeholder="Prix" value="{{ $billetterie->prix }}">
                <input type="datetime-local" id="date" name="date" value="{{ $billetterie->date }}">
                <input type="time" name="heure_fin" value="{{ $billetterie->heure_fin }}">
                <input type="submit" class="admin_buttons_primary" value="Mettre à jour">
            </form>
        </div>
    </div>
@endsection
