<!DOCTYPE html>

<html lang="fr">
    <head> 
        <!-- Metatags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Styles -->  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">        
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="icon" href="public/images/favicon.ico">
    	<title><?= $title ?></title>
    </head>

    <body>
        <header>
            <nav>
                <input type="checkbox" id="menuIcone">
                <ul id="ulBackEnd">
                    <li><a href="index.php?action=seeDashboard">Tableau de bord</a></li>
                    <li><a href="index.php?action=seeAddPost">Rédaction d'un chapitre</a></li>
                    <li><a href="index.php?action=seeEditPosts">Édition des chapitres et commentaires</a></li>
                    <li><a href="index.php?action=seeSettings">Paramètres de connexion</a></li>
                    <li><a href="index.php?action=signOut">Déconnexion</a></li>
                </ul>
                <label id="labelBackEnd" for="menuIcone"><i class="fas fa-bars"></i></label>
            </nav>
            <hr>
            <h1>BILLET SIMPLE POUR L'ALASKA</h1>
            <hr>
            <h2><?= $title ?></h2>
        </header>

        <section >
        	<?= $content ?>
        </section>

        <footer id="footerBackEnd" class="flex">
            <img class="logo" src="public/images/logo.png">
            <p>COPYRIGHT © JEAN FORTEROCHE | CREATION : ND</p>
        </footer>

        <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=avd49kvodyddbqbc9lzov483vhdcsdhw01bg383bck1zn0nq"></script>
        <script src="public/js/tinymceConfig.js"></script>
    </body>
</html>