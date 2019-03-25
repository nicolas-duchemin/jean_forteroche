<!DOCTYPE html>

<html lang="fr">
    <head> 
        <!-- Metatags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Billet simple pour l'Alaska - Le nouveau roman en ligne de Jean Forteroche">
        <!-- Card meta (Twitter) -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Jean Forteroche">
        <meta name="twitter:image:src" content="http://jean-forteroche.normandie-web-creation.fr/public/images/publishing.png">
        <meta name="twitter:url" content="http://jean-forteroche.normandie-web-creation.fr/" />
        <meta name="twitter:description" content="Billet simple pour l'Alaska - Le nouveau roman en ligne de Jean Forteroche">
        <!-- Open Graph meta (Facebook, LinkedIn) -->
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Jean Forteroche" />
        <meta property="og:image" content="http://jean-forteroche.normandie-web-creation.fr/public/images/publishing.png" />
        <meta property="og:url" content="http://jean-forteroche.normandie-web-creation.fr/" />
        <meta property="og:description" content="Billet simple pour l'Alaska - Le nouveau roman en ligne de Jean Forteroche" />
        <!-- Styles -->  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">        
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="icon" href="public/images/favicon.png">      
        <title><?= $title ?></title>
    </head>

    <body>
        <header>
            <nav>
                <input type="checkbox" id="menuIcone">
                <ul id="ulFrontEnd">
                    <li><a href="accueil.html">ACCUEIL</a></li>
                    <li><a href="chapitres.html">LISTE DES CHAPITRES</a></li>
                    <li><a href="auteur.html">AUTEUR</a></li>
                </ul>
                <label id="labelFrontEnd" for="menuIcone"><i class="fas fa-bars"></i></label>
            </nav>
            <hr>
            <h1>BILLET SIMPLE POUR L'ALASKA</h1>
            <hr>
            <h2><?= $title ?></h2>
        </header>

        <section >
        	<?= $content ?>
        </section>

        <footer class="flex footerFrontEnd">
            <div class="flex footerFrontEnd">
                <img class="logo" src="public/images/logo.png" alt="initiales de Jean Forteroche">
                <p>COPYRIGHT © JEAN FORTEROCHE | CREATION : ND</p>
            </div>
            <p><a class="button" href="administration.html">Administration</a></p>
        </footer>
    </body>
</html>