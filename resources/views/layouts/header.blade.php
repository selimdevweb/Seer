<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container-fluid">
           @auth
           <a class="navbar-brand" href="{{ route('user.dashboard') }}">Mon profil</a>
           <a class="navbar-brand" href="{{ route('index.cart') }}"> <button class="btn btn-danger font-weight-bold">{{ \Cart::session(auth()->user()->id)->getTotalQuantity() }}</button>  <i class="fas fa-shopping-cart"></i></a>
           @endauth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="navbar-brand" href="/">Accueil</a>
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
                            <a class="nav-link" href="{{ route('user.logout') }}">Déconnexion</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
