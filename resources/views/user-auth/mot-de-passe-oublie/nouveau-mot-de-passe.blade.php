@extends('user-auth.layouts.app')

@section('title')
    Seer | Nouveau mot de passe
@endsection

@section('content')
    <div class="main__content main__MotDePasse">
        <h1>Nouveau mot de passe</h1>
        <div class="main__form">

            <form method="POST" action="{{ route('user.nouveau-mot-de-passe.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus placeholder="Entrez votre adresse email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="password" type="password" @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Entrez votre nouveau mot de passe">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirmez votre nouveau mot de passe">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Confirmer
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
