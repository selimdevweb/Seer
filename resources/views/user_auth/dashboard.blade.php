@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <h1>Mon compte</h1>
    @if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
            {{ session()->get('message') }}
        </p>
    </div>
    <form action="{{ route('file.store') }}" method="POST" class="d-flex flex-column justify-content-between align-items-center"  enctype="multipart/form-data">
        @csrf
        <div class="custom-file">
            <input type="file" id="customFile" name="file_path">
            <label class="file flex center_colonne center_row" for="customFile">Envoyer un fichier</label>
        </div>
       @error('file_path')
{{ $message }}
       @enderror
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="accept" name="rgpd" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL.
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <embed src=http://monsite.fr/monfichier.pdf width=800 height=500 type='application/pdf'/>
@endsection
