@extends('layouts.app')

@section('title')
    Seer | Inscription
@endsection

@section('content')

        <div class="main__content">
            <h1>Inscription</h1>
            <div class="main__form">
                <form action="{{ route('inscription.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <input type="text" name="nom" placeholder="Votre Nom" value="{{ old('nom') }}">

                        @error('nom')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="text" name="prenom" placeholder="Votre Prénom" value="{{ old('prenom') }}">

                        @error('prenom')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Votre adresse mail" value="{{ old('email') }}">

                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Votre mot de passe">

                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password_confirmation" placeholder="Confirmez votre mot de passe">

                        @error('password_confirmation')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="main__formRgpd">
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
@endsection


