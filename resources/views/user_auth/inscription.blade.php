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

                @error('nom')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <input type="text" class="form-control" name="prenom" placeholder="Votre Prénom" value="{{ old('prenom') }}">

                @error('prenom')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>


            <div class="mb-3">
                <input type="email" class="form-control"  name="email" placeholder="Votre adresse mail" value="{{ old('email') }}">

                @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">

                @error('password')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmez votre mot de passe">

                @error('password_confirmation')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value=2 name="rgpd" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL.</label>
            </div>
            @error('rgpd')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection


