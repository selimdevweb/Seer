@extends('layouts.app')

@section('title')
    Connexion
@endsection

@section('content')
    <h1 class="text-center">Connexion</h1>
    <div class="flex center_row">
        <form action="{{ route('connexion.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <input type="email" class="form-control"  name="email" placeholder="Votre adresse mail" value="{{ old('email') }}">
            </div>

            @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
            @enderror

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe">
            </div>

            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
@endsection


