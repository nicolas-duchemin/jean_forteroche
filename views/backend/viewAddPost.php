<?php 

$title = 'Rédaction d\'un chapitre';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>RÉDACTION D'UN CHAPITRE</h2>
    
    <?php 

$content = ob_get_clean();

require('templateBackend.php'); 

?>