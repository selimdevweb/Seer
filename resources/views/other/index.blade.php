@extends('user-auth.layouts.app')

@section('title')
    Seer | Accueil
@endsection

@section('content')
    <div>
        @include('user-auth.layouts.seer-nav')

        <div class="d-flex justify-content-center">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

        <h1>Accueil SEER</h1>

    </div>
@endsection
