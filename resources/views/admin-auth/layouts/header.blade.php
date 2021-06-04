<header class="main__nav">
    <nav class="d-flex flex-column align-items-left justify-content-center">
        @guest
            <a href="{{ route('login') }}">Connexion</a>
        @endguest
        @auth
            <h2>Navigation</h2>
            <a href="{{ route('admin.tableau-de-bord') }}" >Tableau de bord</a>
            <a href="{{ route('admin.gestion-des-membres') }}" >Gestion des membres</a>
            <a href="{{ route('admin.deconnexion') }}" >Deconnexion</a>

            <h2>Réglages</h2>
            <a href="#" >Gestion page d'accueil</a>
            <a href="{{ route('admin.informations-billetterie') }}">Informations billetterie</a>
        @endauth
    </nav>
</header>
