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

    foreach
editer supprimer
    end

        <div class="d-flex justify-content-center">
            <form action="#" method="post" class="form-group" >
                <h3>Billeterie</h3>

                <h4>Parametres de la billeterie</h4>
                <input type="number" name="quantite" placeholder="Quantité">
                <input type="number" name="prix" placeholder="Prix">
                <input type="datetime-local" name="date_distri" id="debut">
                <input type="time" name="" id="">

                <input type="submit" value="Créér">
            </form>
        </div>
@endsection
