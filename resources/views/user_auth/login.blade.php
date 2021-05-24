@extends('layouts.app')

@section('title')
    Seer | Connexion
@endsection

@section('content')

<div class="d-flex justify-content-center">
<div class="user_form">
    <h1 class="text-center">Connexion</h1>
    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div class="d-flex flex-column align-items-center">

            <div class="mb-3 ">
                <input type="email" name="email" placeholder="Votre adresse mail" value="{{ old('email') }}">
            </div>

            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="d-flex flex-column align-items-center">
            <div class="mb-3">
                <input type="password" name="password" placeholder="Votre mot de passe">
            </div>

            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
</div>
@endsection
