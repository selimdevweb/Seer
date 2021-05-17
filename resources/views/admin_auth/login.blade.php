@extends('layouts_admin.app')

@section('title')
    Admin Connexion
@endsection

@section('content')
<h1 class="text-center">Admin Connexion</h1>
<div class="flex center_row">
    <form action="{{ route('admin_login.store') }}" method="POST">
        @csrf

        @error('email')
                <div class="error">
                    {{ $message }}
                </div>
        @enderror
        <div class="mb-3">
            <input type="email" class="form-control"  name="email" placeholder="Votre adresse mail" value="{{ old('email') }}">
        </div>

        @error('password')
                <div class="error">
                    {{ $message }}
                </div>
        @enderror

        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Votre mot de passe">
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
@endsection
