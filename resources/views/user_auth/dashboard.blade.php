@extends('layouts.app')

@section('title')
    Mon profil
@endsection

@section('content')
    <article class=" d-flex justify-content-center w-100">
        <h1>Mon profil</h1>

    </article>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (auth()->user()->status == 0 | auth()->user()->status == 2)

    @if (auth()->user()->status == 2)
    Vos documents sont refusé merci de renvoyer vos documents avec le formulaire ci-dessous
    @endif

   @if (!$files->count() > 0)
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

    @error('rgpd')
        {{ $message }}
    @enderror

    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
    @endif

    @elseif (auth()->user()->status ==1)

        <article class="alert alert-primary text-center">
            <span>Vos Documents sont approuvés !</span>
            @foreach ($files as $file)
                    <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
            @endforeach
        </article>

        <article class="bg-light">
    -       @foreach ($billeteries as $billetterie)
                <div class="text-center">
                    <h2>Distribution du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                    <span>Prix : {{ $billetterie->prix }}€</span>
                    <p>Quantité(s) : {{ $billetterie->quantite }}</p>
                    <a href="{{ route('user.checkout') }}">Réserver</a>
                </div>
            @endforeach
        </article>

    @endif

@endsection
