@extends('layouts.app')

@section('title')
    Seer | Accueil
@endsection

@section('content')
<div class="d-flex justify-content-center">
<<<<<<< HEAD
    <h1>Accueil SEER</h1>
=======
<h1>Accueil SEER</h1>
>>>>>>> 37bc57b7885d52fe7d674aa8cc50ca6defaa3849
    @if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
            {{ session()->get('message') }}
        </p>
    </div>
</div>
@endif
@endsection
