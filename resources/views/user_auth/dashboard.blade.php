@extends('layouts.app')

@section('title')
    Seer | Mon profil
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <h1>Mon profil</h1>
    </div>

    @if (session()->has('message'))
        <article class="alert alert-success text-center">
            <span>{{ session()->get('message') }}</span>
        </article>
    @endif

    @if (auth()->user()->status == 0 | auth()->user()->status == 2)

    @if (auth()->user()->status == 2)
        <article class="alert alert-danger text-center">
            <span>Vos documents sont refusé merci de renvoyer vos documents avec le formulaire ci-dessous !</span>
        </article>
    @endif

    @if (!$files->count() > 0)
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="user_form">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <input type="file" id="customFile" name="file_path">
                        <label for="customFile">Selectionner un fichier</label>
                    </div>

                    @error('file_path')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <div class="d-flex justify-content-center align-items-center ">
                        <div>
                            <input type="checkbox" value=2 name="rgpd" id="flexCheckDefault">
                        </div>
                        <label for="flexCheckDefault">
                            <div>
                                Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL.
                            </div>
                        </label>
                    </div>
                    @error('rgpd')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                    @enderror

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    @endif

    @elseif (auth()->user()->status ==1)


        <div class="d-flex flex-column justify-content-center align-items-center">
        <article class="user_card user_dashboard">
            <article class="alert alert-primary text-center ">
                <span>Vos Documents sont approuvés !</span>
                @foreach ($files as $file)
                        <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
                @endforeach
            </article>
    -       @foreach ($billeteries as $billetterie)
                <div class="text-center">
                    <h2>Distribution du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                    <span>Prix : {{ $billetterie->prix }}€</span>
                    <p>Quantité(s) : {{ $billetterie->quantite }}</p>
                    <a href="{{ route('user.checkout') }}">Réserver</a>
                </div>
            @endforeach
        </article>
    </div>

    @endif

@endsection
