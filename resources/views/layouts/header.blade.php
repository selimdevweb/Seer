<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Accueil</a>
            <a class="navbar-brand" href="{{ route('index.cart') }}">Panier</a>
           @auth
           <a class="navbar-brand" href="{{ route('user.dashboard') }}">Mon profil</a>
           @endauth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
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
                            <a class="nav-link" href="{{ route('user.logout') }}">Déconnexion</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
