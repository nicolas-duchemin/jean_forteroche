<?php 

$title = 'Liste des chapitres'; 

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>LISTE DES CHAPITRES</h2>

    <?php while ($post = $postsData->fetch()) {
    
        ?>

        <h3><?= htmlspecialchars($post['title']) ?></h3>

        <p><em>Publié le <?= $post['creation_date_fr'] ?></em></p>

        <p>
            <?= nl2br(htmlspecialchars($post['preview'])) ?> [...]<br>
            <em><a href="index.php?action=seePost&amp;postId=<?= $post['post_id'] ?>">Lire la suite</a></em>
        <p>

        <?php

    }

    $postsData->closeCursor(); 

$content = ob_get_clean();

require('template.php'); ?>