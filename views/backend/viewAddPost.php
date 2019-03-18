<?php 

$title = 'Rédaction d\'un chapitre';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>RÉDACTION D'UN CHAPITRE</h2>
    
	<form action="index.php?action=addPost" method="post">
        <fieldset>
            <legend>Ajouter un chapitre</legend> 
            <p><label for="title">Titre</label> <input type="text" id="title" name="title"></p>
            <p><label for="content">Contenu</label></p>
            <p><textarea id="content" name="content" cols="50"></textarea></p>
            <p><input type="submit" value="Publier"></p>
        </fieldset>
    </form>

    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>