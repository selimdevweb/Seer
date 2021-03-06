<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inscription') }}">Inscription</a>
                        </li>
                    @endguest
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">Mon profil</a>
                        </li>
                    @endauth

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">Déconnexion</a>
                        </li>
                    @endauth
                </ul>

                <ul class="navbar-nav ml-auto">
                    @auth

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('index.cart') }}"><i class="fas fa-shopping-cart"></i> {{ \Cart::session(auth()->user()->id)->getTotalQuantity() }}</a>
                        </li>

                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
