<?php 

$title = 'Billet simple pour l\'Alaska';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <p>LE NOUVEAU ROMAN DE JEAN FORTEROCHE</p>

    <h2>DESCRIPTION DU ROMAN</h2>

    <p>
        Bloqués par la neige, la folie les guette ! Ou bien est-ce la folie à l'origine de tout ?<br>
        Découvrez l'effroyable aventure de 24 voyageurs perdus dans les plaines de l'Alaska...
    </p>

    <h2>DERNIER CHAPITRE PUBLIÉ</h2>

    <h3><?= htmlspecialchars($lastPost['title']) ?></h3>

    <p><em>Publié le <?= $lastPost['creation_date_fr'] ?></em></p>

    <p>
        <?= $lastPost['preview'] ?> [...]<br>
        <em><a href="index.php?action=seePost&amp;postId=<?= $lastPost['post_id'] ?>">Lire la suite</a></em>
    <p>
    
    <?php 

$content = ob_get_clean();

require('template.php'); 

?>