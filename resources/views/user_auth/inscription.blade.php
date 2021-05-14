@extends('layouts.app')

@section('title')
    Inscription
@endsection

@section('content')
    <h1 class="text-center">Inscription</h1>
    <div class="flex center_row">
        <form action="{{ route('inscription.store') }}" method="POST">
            @csrf
            @error('nom')
                    <div class="error border border-danger m-1">
                        {{ $message }}
                    </div>
            @enderror

            <div class="mb-3">
                <input type="text"
                class="form-control
                @error('nom') border border-danger @enderror" name="nom" placeholder="Votre Nom" value="{{ old('nom') }}">
            </div>

            @error('prenom')
            <div class="error">
                {{ $message }}
            </div>
            @enderror
            <div class="mb-3">
                <input type="text" class="form-control" name="prenom" placeholder="Votre Prénom" value="{{ old('prenom') }}">
            </div>


            @error('email')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror
            <div class="mb-3">
                <input type="email" class="form-control"  name="mail" placeholder="Votre adresse mail" value="{{ old('mail') }}">
            </div>

            @error('password')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">
            </div>

        @error('password_confirmation')
                    <div class="error">
                        {{ $message }}
                    </div>
            @enderror
            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="rgpd" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL. Vous pouvez à tout moment utiliser le lien de désabonnement intégré dans la newsletter. En savoir plus sur la gestion de vos données et vos droits
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection


