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
    Vos Documents sont approuvés
    @endif

    <div class="d-flex flex-column">

        @if (auth()->user()->status==1)
        @foreach ($billeteries as $billeterie)
        <p>{{ $billeterie->titre }}</p>
        @endforeach
        @endif

        @foreach ($files as $file)

            <div class="d-flex flex-column justify-content-center align-items-center w-100">
                <h2>{{ $file->file_path }}</h2>
                <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
               {{--  <form action="{{ route('file.destroy',$file->id ) }}" method="post">
                @csrf
                <input type="submit" value="Supprimer">
                </form> --}}
            </div>
        @endforeach
    </div>




@endsection
