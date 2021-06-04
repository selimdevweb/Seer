@extends('admin-auth.layouts.app')

@section('title')
    Admin | Informations complémentaires
@endsection

@section('content')
    <div class="main__content">
        <h1>Informations complémentaires</h1>

        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif

        @if ($seerInfos == null)
            <div class="d-flex justify-content-center">
                <div class="main__form admin_card">
                    <form action="{{ route('admin.informations-billetterie.create') }}" method="post">
                        @csrf

                        <textarea name="description" placeholder="Entrez une description"></textarea>
                        <input type="text" name="adresse" placeholder="Entrez une adresse">
                        <input type="submit" class="admin_buttons_primary" value="Créér">
                    </form>
                </div>
            </div>

        @elseif($seerInfos != null)
        <div class="d-flex justify-content-center">
            <div class="main__form admin_card">
                <form action="{{ route('admin.informations-billetterie.update', $seerInfos->id) }}" method="post">
                    @csrf

                    <textarea name="description" placeholder="Entrez une description">{{ $seerInfos->description }}</textarea>
                    <input type="text" name="adresse" placeholder="Entrez une adresse" value="{{ $seerInfos->adresse }}">
                    <input type="submit" class="admin_buttons_primary" value="Mettre à jour">
                </form>
            </div>
        </div>

        @endif

    </div>
@endsection
