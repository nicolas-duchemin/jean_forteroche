<!DOCTYPE html>

<html lang="fr">
    <head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=" ">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800">
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="icon" href="public/img/favicon.png">
    	<title><?= $title ?></title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php?action=seeHome">ACCUEIL</a></li>
                    <li><a href="index.php?action=seeListPosts">LISTE DES CHAPITRES</a></li>
                    <li><a href="index.php?action=seeAuthor">AUTEUR</a></li>
                </ul>
                <form>
                    <label for="menuIcone"><i class="fas fa-bars"></i></label>
                    <input type="checkbox" name="menuIcone" id="menuIcone">
                </form>
            </nav>
            <hr>
            <h1>BILLET SIMPLE POUR L'ALASKA</h1>
            <hr>
            <h2><?= $title ?></h2>
        </header>

        <section >
        	<?= $content ?>
        </section>

        <footer class="flex">
            <p>COPYRIGHT © JEAN FORTEROCHE | CREATION : ND</p>
            <p><a class="button" href="index.php?action=seeSignIn">Administration</a></p>
        </footer>
    </body>
</html>