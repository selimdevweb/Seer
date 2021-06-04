<!doctype html>
<html lang="fr">
    <head>
        <title>Réinitialisation de votre mot de passe</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>
    <body>
        <div class="main__content">
            <h1>Réinitialisation de votre mot de passe</h1>
            <div class="main__form">
                <p>
                    Veuillez <a href="{{ route('user.nouveau-mot-de-passe.index', $token) }}">Cliquez ici</a> pour réinitialiser votre mot de passe.
                    Ce lien expirera 30 minutes après la réception de cet e-mail.
                    Si vous ne pouvez pas changer votre mot de passe dans ce délai, veuillez effectuer une nouvelle demande de réinitialisation.
                </p>
                <p>L'équipe SEER</p>
                @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

            </div>
        </div>
    </body>
</html>

