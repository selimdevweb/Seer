@extends('user-auth.layouts.app')

@section('title')
    Seer | Mon profil
@endsection

@section('content')
    <div class="main__content">
        <h1>Mon profil</h1>

        @if (session()->has('message'))
            <article class="alert alert-success text-center">
                <span>{{ session()->get('message') }}</span>
            </article>
        @endif

        @if (auth()->user()->status == 0 && $files->count() > 0 )
            <article class="alert alert-danger text-center">
                <span>Vos documents sont en cours de validations merci d'attendre la fin de cette étape</span>
            </article>
        @endif

        @if (auth()->user()->status == 0 | auth()->user()->status == 2)

        @if (auth()->user()->status == 2)
            <article class="alert alert-danger text-center">
                <span>Vos documents sont refusé merci de renvoyer vos documents avec le formulaire ci-dessous !</span>
            </article>
        @endif

        @if (!$files->count() > 0)
                <div class="main__form">
                    <form action="{{ route('user.profil.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <input type="file" id="customFile" name="file_path">
                            <label for="customFile">Selectionner un fichier</label>
                        </div>

                        @error('file_path')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="main__formRgpd">
                            <div>
                                <input type="checkbox" value=2 name="rgpd" id="flexCheckDefault">
                            </div>
                            <label for="flexCheckDefault">
                                <div>
                                    Votre adresse de messagerie est uniquement utilisée pour vous envoyer les lettres d'information de la CNIL.
                                </div>
                            </label>
                        </div>

                        <div class="mb-3">
                            @error('rgpd')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
        @endif

        @elseif (auth()->user()->status ==1)
            <div>
                <article class="user_card user_dashboard">
                    <article class="alert alert-primary text-center ">
                        <span>Vos Documents sont approuvés !</span>
                        @foreach ($files as $file)
                                <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
                        @endforeach
                    </article>

                    @foreach ($billeteries as $billetterie)
                        <div class="main__cardBilletterie">
                            <h2>Colis secs du : {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }} {{ $billetterie->prix }}€</h2>
                            <img src="{{ asset('images/colis-seer.jpg') }}" >
                            <p>{{ $seerInfos->description }}</p>
                            <h6>
                                <a href="https://www.google.com/maps/place/{{ $seerInfos->adresse }}" target="_blank">{{ $seerInfos->adresse }}</a>
                            </h6>
                            <input type="number" name="quantity" value="1">

                            @if ($billetterie->quantite<1)
                                <p>Il n'ya plus de colis en stock</p>

                            @elseif ($billetterie->quantite>0)
                                <a href="{{ route('user.panier.add', $billetterie->id) }}">Ajouter au panier</a>

                            @endif
                        </div>
                    @endforeach
                </article>
            </div>
        @endif
    </div>

@endsection
