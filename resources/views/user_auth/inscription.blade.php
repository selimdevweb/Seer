@extends('layouts.app')

@section('title')
    Inscription
@endsection

@section('content')
    <h1 class="text-center">Inscription</h1>
    <div class="flex center_row">
        <form action="{{ route('inscription.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <input type="text" class="form-control" name="nom" placeholder="Votre Nom" value="{{ old('nom') }}">
            </div>
                @error('name')
                    <div class="error">
                        <p>Merci de mettre votre nom !</p>
                    </div>
                @enderror
            <div class="mb-3">
                <input type="text" class="form-control" name="prenom" placeholder="Votre Prénom" value="{{ old('prenom') }}">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control"  name="mail" placeholder="Votre adresse mail" value="{{ old('mail') }}">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe" value="{{ old('mail') }}">
            </div>

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


