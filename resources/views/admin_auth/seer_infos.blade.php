@extends('layouts_admin.app')

@section('title')
    Admin - SEER-Infos
@endsection

@section('content')
    <h1>SEER Infos</h1>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif



        <div class="d-flex justify-content-center">
            <form action="#" method="post" class="form-group" >
                <h4>Infos Billeterie</h4>
                <textarea name="description_billeterie" cols="30" rows="10"></textarea>
                <input type="text" name="adresse_distri">
                <input type="submit" value="Créér">
            </form>
        </div>
@endsection
