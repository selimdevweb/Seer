@extends('layouts_admin.app')

@section('title')
    Admin | Gestion des membres
@endsection

@section('content')
    <h1>Gestion des membres</h1>
    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl px-4 py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif
    <section class="d-flex justify-content-center">
        <table class="admin_tableau admin_card">
            <thead>
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Fichier</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                        <tr>
                            <td>
                                <i class="fas fa-check
                                    @if ($user->status == 1)
                                    valid
                                    @else
                                    invalid
                                    @endif">
                                </i>
                            </td>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ asset('pdf/'.$user->file_path) }}" target="_blank">{{ $user->file_path }}</a></td>
                            <td>
                                <form action="{{ route('admin.utilisateur.valid', $user->user_id) }}" method="post">
                                    @csrf

                                    <input type="hidden" value="1" name="valider">
                                    <button type="submit" class="btn admin_tableau_valid">Valider</button>
                                </form>
                            </td>
                            <td scope="row">
                                <form action="{{ route('admin.utilisateur.invalid', $user->user_id) }}" method="post">
                                    @csrf

                                    <input type="hidden" value="2" name="invalider">
                                    <input type="hidden" value="{{ $user->file_path }}" name="pdf">
                                    <button type="submit" class="btn admin_tableau_invalid">Refuser</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
