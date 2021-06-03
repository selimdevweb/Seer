@extends('user-auth.layouts.app')

@section('title')
    Seer | Accueil
@endsection

@section('content')
{{-- @include('layouts.seer_nav') --}}
    <div class="d-flex justify-content-center">
        <h1 class="text-secondary">Accueil SEER</h1>
        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif
    </div>
@endsection
