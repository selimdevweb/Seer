@extends('layouts_admin.app')

@section('title')
    Admin - {{ $billetterie->titre }}
@endsection

@section('content')
    <h1>{{ $billetterie->titre }}</h1>
    <div class="d-flex justify-content-center">
        <form action="{{ route('admin.billetterie.update', $billetterie->id) }}" method="post" class="form-group" >
            @csrf

            <input type="number" name="quantite" placeholder="Quantité" value="{{ $billetterie->quantite }}">
            <input type="number" name="prix" placeholder="Prix" value="{{ $billetterie->prix }}">
            <input type="datetime-local" name="date" value="{{ $billetterie->date }}">
            <input type="time" name="heure_fin" value="{{ $billetterie->heure_fin }}">
            <input type="submit" value="Valider">
        </form>
    </div>
@endsection
