<?php 

$title = 'Édition des chapitres et commentaires';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>ÉDITION DES CHAPITRES ET COMMENTAIRES</h2>
    
    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>