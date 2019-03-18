<?php 

$title = 'Suppression d\'un chapitre';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>SUPPRESSION D'UN CHAPITRE</h2>
    
	<p>Êtes-vous sûr de vouloir supprimer ce chapitre et tous les commentaires associés ?</p>

    <a href="index.php?action=removePost&amp;postId=<?= $postId ?>">Oui</a> <a href="index.php?action=seeEditPost&amp;postId=<?= $postId ?>">Non</a>

    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>