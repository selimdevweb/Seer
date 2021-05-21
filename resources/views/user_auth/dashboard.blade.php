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
    @endif

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
            <div class="d-flex flex-row">
                <input class="" type="checkbox" value="accept" name="rgpd" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL.
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

    <div class="d-flex flex-column">

        @if (auth()->user()->status==1)
        @foreach ($billeteries as $billeterie)
        <p>{{ $billeterie->titre }}</p>
        @endforeach
        @endif

        @foreach ($files as $file)

            <div class="d-flex flex-column justify-content-center align-items-center w-100">
                {{-- <a class="m-2" href="{{ asset('pdf') . '/'. $file->file_path }}">
                    <embed src='{{ asset('pdf') . '/'. $file->file_path }}' width=150 height=200 type='application/pdf'/>
                </a> --}}
                <h2>{{ $file->file_path }}</h2>
                <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
                <a href="">Supprimer Pdf</a>
            </div>
        @endforeach
    </div>




@endsection
