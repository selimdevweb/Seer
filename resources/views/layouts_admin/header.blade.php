<header class="main__nav">
    <nav class="d-flex flex-column align-items-left justify-content-center">
        <h2>Navigation</h2>
        @guest
            <a href="{{ route('login') }}">Connexion</a>
        @endguest
        @auth
            <a href="{{ route('admin.dashboard') }}" >Tableau de bord</a>
            <a href="{{ route('admin.utilisateur') }}" >Gestion des membres</a>
            <a href="{{ route('admin.logout') }}" >Deconnexion</a>
            <h2>Réglages</h2>
            <a href="#" >Gestion page d'accueil</a>
            <a href="{{ route('seer.index') }}">Informations Seer</a>
        @endauth
    </nav>
</header>
