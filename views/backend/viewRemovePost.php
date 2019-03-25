<?php 
$title = 'Suppression d\'un chapitre';
ob_start(); 

    ?>
	<h3>CONFIRMATION</h3>
	<div class="bloc">
		<p>Êtes-vous sûr de vouloir supprimer ce chapitre et tous les commentaires associés ?</p>
	</div>
	<p class="buttonArea">
		<a class="button" href="index.php?action=removePost&amp;postId=<?= $postId ?>">Oui</a> <a class="button" href="edition-chapitre-<?= $postId ?>.html">Non</a>
	</p>
    <?php 

$content = ob_get_clean();
require('templateBackend.php'); 
?>