@extends('layouts.app')

@section('title')
    Seer | Connexion
@endsection

@section('content')

    <div class="main__content">
        <h1>Connexion</h1>
        <div class="main__form">
            <form action="{{ route('login.store') }}" method="POST">
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

                <button type="submit" class="btn btn-primary">Envoyer</button>

                <a  class=" pb-2" href="{{ route('index.password') }}">Mot de passe oublié ?</a>
            </form>
        </div>
    </div>
@endsection
