@extends('user-auth.layouts.app')

@section('title')
    Seer | Connexion
@endsection

@section('content')

    <div class="main__content">
        <h1>Connexion</h1>
        @if (session()->has('status'))
        <article class="alert alert-danger text-center">
            <span>{{ session()->get('status') }}</span>
        </article>
        @endif
        <div class="main__form">
            <form action="{{ route('other.connexion.store') }}" method="POST">
                @csrf

                    <div class="mb-3 ">
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
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>

                    <div class="mb-3">
                        <a  class=" pb-2" href="{{ route('user.mot-de-passe-oublie.getEmail') }}">Mot de passe oublié ?</a>
                    </div>
            </form>
        </div>
    </div>
@endsection
