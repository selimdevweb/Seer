@extends('layouts_admin.app')

@section('title')
    Admin - SEER-Infos
@endsection

@section('content')
    <h1>Validation utilisateur</h1>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <table class="table">
        <thead>
          <tr>

            <th scope="col">Status</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Mail</th>
            <th scope="col">Fichier</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row" class=""><i class="fas fa-check-square
                        @if ($user->status == 1)
                        valid
                        @else
                        invalid
                        @endif"></i></th>
                    <th scope="row">{{ $user->nom }}</th>
                    <th scope="row">{{ $user->prenom }}</th>
                    <td scope="row">{{ $user->email }}</td>
                    <td scope="row"><a href="{{ asset('pdf/'.$user->file_path) }}" target="_blank">{{ $user->file_path }}</a></td>
                    <td scope="row">
                        <form class="boutton_edit" action="{{ route('admin.utilisateur.valid', $user->user_id) }}" method="post">
                            @csrf
                            <input type="hidden" value="1" name="valider">
                            <button type="submit" class="btn btn-success visible">Valider</button>
                        </form>
                    </td>
                    <td scope="row">
                        <form class="boutton_edit" action="{{ route('admin.utilisateur.invalid', $user->user_id) }}" method="post">
                            @csrf
                            <input type="hidden" value="0" name="invalider">
                            <button type="submit" class="btn btn-danger visible-rouge">Refuser</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection
