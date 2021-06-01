@extends('layouts.app')

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

<<<<<<< HEAD
    @if (auth()->user()->status == 2)
        <div class="alert alert-danger text-center">
            <span>Vos documents sont refusé merci de renvoyer vos documents avec le formulaire ci-dessous !</span>
        </div>
    @endif

    @if ($files->count() < 1)
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="user_form">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
=======
        @if (auth()->user()->status == 0 | auth()->user()->status == 2)

        @if (auth()->user()->status == 2)
            <article class="alert alert-danger text-center">
                <span>Vos documents sont refusé merci de renvoyer vos documents avec le formulaire ci-dessous !</span>
            </article>
        @endif
>>>>>>> 1637e357a82067dc54dc7045284c632c93dff85c

        @if (!$files->count() > 0)
                <div class="main__form">
                    <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
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

<<<<<<< HEAD
<div class="d-flex flex-column justify-content-center align-items-center">
        <article class="user_dashboard">
            <div class="alert alert-primary text-center ">
                <span>Vos Documents sont approuvés !</span>
                @foreach ($files as $file)
                        <a class="m-2" href="{{ asset('pdf/'.$file->file_path) }} " target="blank">Voir pdf</a>
                @endforeach
            </div>

            @foreach ($billeteries as $billetterie)
                <div class="d-flex justify-content-center align-items-center text-center billetterie user_card">
                    <div class="img_billetterie">
                        <img src="{{ asset('images/colis-seer.jpg') }}" >
                    </div>
                    <div class="product_desc">{{--
                        <h6 class="txt">Distribution du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }} --}}</h6>
                        <h2>Colis secs - {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                        <h3>{{ $billetterie->prix }}€</h3>
                        {{-- <p>Quantité(s) : {{ $billetterie->quantite }}</p> --}}
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia bibendum massa, in dignissim dui blandit nec. Morbi lobortis elit mollis efficitur consequat. Etiam varius sem eu tempor feugiat. Vestibulum convallis tortor sed ex blandit, eget cursus nibh tempor. Duis laoreet tincidunt sem, in consectetur ligula facilisis ut.</p>
                        <div class="product"><span>Disponibilité: En stock</span></div>
                        {{-- <form action="{{ route('cart.update', $billetterie->id) }}" class="user_shop">
                            @csrf
                            <input type="number" name="quantity" value="1">
                            <input type="submit" value="Ajouter au panier">
                        </form> --}}
                        <div class="user_shop">
                            <input type="number" name="quantity" value="1">
                        <a href="{{ route('add.cart', $billetterie->id) }}">Ajouter au panier</a>
=======
                        <div class="mb-3">
                            @error('rgpd')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
>>>>>>> 1637e357a82067dc54dc7045284c632c93dff85c
                        </div>
                    </form>
                </div>
<<<<<<< HEAD
            @endforeach

            @foreach ($billeteries as $billetterie)
            <div class="d-flex justify-content-center align-items-center text-center billetterie user_card" style="height: 500px">
                <div class="img_billetterie">
                    <img src="{{ asset('images/colis-seer.jpg') }}" >
                </div>
                <div class="product_desc">{{--
                    <h6 class="txt">Distribution du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }} --}}</h6>
                    <h2>Colis secs - {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                    <h3>{{ $billetterie->prix }}€</h3>
                    {{-- <p>Quantité(s) : {{ $billetterie->quantite }}</p> --}}
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia bibendum massa, in dignissim dui blandit nec. Morbi lobortis elit mollis efficitur consequat. Etiam varius sem eu tempor feugiat. Vestibulum convallis tortor sed ex blandit, eget cursus nibh tempor. Duis laoreet tincidunt sem, in consectetur ligula facilisis ut.</p>
                    <div class="product"><span>Disponibilité: En stock</span></div>
                    {{-- <form action="{{ route('cart.update', $billetterie->id) }}" class="user_shop">
                        @csrf
                        <input type="number" name="quantity" value="1">
                        <input type="submit" value="Ajouter au panier">
                    </form> --}}
                    <div class="user_shop">
                        <input type="number" name="quantity" value="1">
                    <a href="{{ route('add.cart', $billetterie->id) }}">Ajouter au panier</a>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($billeteries as $billetterie)
        <div class="d-flex justify-content-center align-items-center text-center billetterie user_card" style="height: 500px">
            <div class="img_billetterie">
                <img src="{{ asset('images/colis-seer.jpg') }}" >
            </div>
            <div class="product_desc">{{--
                <h6 class="txt">Distribution du {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }} --}}</h6>
                <h2>Colis secs - {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                <h3>{{ $billetterie->prix }}€</h3>
                {{-- <p>Quantité(s) : {{ $billetterie->quantite }}</p> --}}
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia bibendum massa, in dignissim dui blandit nec. Morbi lobortis elit mollis efficitur consequat. Etiam varius sem eu tempor feugiat. Vestibulum convallis tortor sed ex blandit, eget cursus nibh tempor. Duis laoreet tincidunt sem, in consectetur ligula facilisis ut.</p>
                <div class="product"><span>Disponibilité: En stock</span></div>
                {{-- <form action="{{ route('cart.update', $billetterie->id) }}" class="user_shop">
                    @csrf
                    <input type="number" name="quantity" value="1">
                    <input type="submit" value="Ajouter au panier">
                </form> --}}
                <div class="user_shop">
                    <input type="number" name="quantity" value="1">
                <a href="{{ route('add.cart', $billetterie->id) }}">Ajouter au panier</a>
                </div>
            </div>
        </div>
    @endforeach
        </article>

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
                                <h2>Colis secs - {{ \Carbon\Carbon::parse($billetterie->date)->translatedFormat('d/m/Y') }}</h2>
                                <h3>{{ $billetterie->prix }}€</h3>
                                <img src="{{ asset('images/colis-seer.jpg') }}" >
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacinia bibendum massa, in dignissim dui blandit nec. Morbi lobortis elit mollis efficitur consequat. Etiam varius sem eu tempor feugiat. Vestibulum convallis tortor sed ex blandit, eget cursus nibh tempor. Duis laoreet tincidunt sem, in consectetur ligula facilisis.</p>
                                <input type="number" name="quantity" value="1">
                                <a href="{{ route('add.cart', $billetterie->id) }}">Ajouter au panier</a>
                        </div>
                    @endforeach
                </article>
            </div>
        @endif
    </div>

@endsection
