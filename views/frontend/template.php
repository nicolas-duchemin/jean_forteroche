<!DOCTYPE html>

<html lang="fr">
    <head> 
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content=" ">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"> 
        <link rel="stylesheet" href="public/css/style.css">
        <link rel="icon" href="public/img/favicon.png">
    	<title><?= $title ?></title>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php?action=seeHome">Accueil</a></li>
                    <li><a href="index.php?action=seeListPosts">Liste des chapitres</a></li>
                    <li><a href="index.php?action=seeAuthor">Auteur</a></li>
                </ul>
            </nav>
        </header>

        <section >
        	<?= $content ?>
        </section>

        <footer>
            <p>COPYRIGHT © JEAN FORTEROCHE | CREATION : ND</p>
            <p><a href="index.php?action=login">Administration</a></p>
        </footer>
    </body>
</html>