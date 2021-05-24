@extends('layouts_admin.app')

@section('title')
    Admin | Informations complémentaire
@endsection

@section('content')
    <h1>Informations complémentaire</h1>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

        <div class="d-flex justify-content-center">
            <div class="admin_card_form admin_card">
            <form action="{{ route('create_infos') }}" method="post">
                @csrf

                <textarea name="description" placeholder="Entrez une description"></textarea>
                <input type="text" name="adresse" placeholder="Entrez une adresse">
                <input type="submit" class="admin_buttons_primary" value="Créér">
            </form>
        </div>
        </div>
@endsection
