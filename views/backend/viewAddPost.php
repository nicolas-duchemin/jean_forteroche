<?php 

$title = 'Rédaction d\'un chapitre';

ob_start(); 

    ?>
    
	<form action="index.php?action=addPost" method="post">
        <p><label for="title">Titre</label></p>
        <p><input type="text" id="title" name="title" placeholder=" Indiquez le titre du chapitre ici..."></p>
        
        <div class="bloc">
	        <p><label for="content">Contenu</label></p>
	        <p><textarea id="content" name="content" rows="50">Écrivez le contenu du chapitre ici...</textarea></p>
        </div>
        
        <p class="buttonArea"><input class="button" type="submit" value="Publier"></p>
    </form>
	
    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>