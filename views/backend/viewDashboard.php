<?php 

$title = 'Tableau de bord';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>TABLEAU DE BORD</h2>

    <p>Derniers commentaires</p>
    <p>Commentaires signalés</p>
    
    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>