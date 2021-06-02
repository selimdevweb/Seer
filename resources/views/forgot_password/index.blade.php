@extends('layouts.app')

@section('title')
    Seer | Mot de passe oublié
@endsection

@section('content')

    <div class="main__content">
        <h1>Mot de passe oublié</h1>
        <div class="main__form">

            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
            @endif

            <form method="POST" action="/mot-de-passe-oublie">
                @csrf

                <div class="mb-3">
                    <input id="email" type="email" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Entrez votre adresse email">
                </div>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="mb-3">
                    <button type="submit">
                        Envoyer
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
