<?php 

$title = 'Billet simple pour l\'Alaska';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <p>LE NOUVEAU ROMAN DE JEAN FORTEROCHE</p>

    <h2>DESCRIPTION DU ROMAN</h2>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <h2>DERNIER CHAPITRE PUBLIÉ</h2>

    <h3><?= htmlspecialchars($lastPost['title']) ?></h3>

    <p><em>Publié le <?= $lastPost['creation_date_fr'] ?></em></p>

    <p>
        <?= nl2br(htmlspecialchars($lastPost['preview'])) ?> [...]<br>
        <em><a href="index.php?action=seePost&amp;id=<?= $lastPost['id'] ?>">Lire la suite</a></em>
    <p>
    
    <?php 

$content = ob_get_clean();

require('template.php'); 

?>