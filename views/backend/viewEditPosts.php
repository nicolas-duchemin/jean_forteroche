<?php 

$title = 'Édition des chapitres et commentaires';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>ÉDITION DES CHAPITRES ET COMMENTAIRES</h2>
    
    <?php while ($post = $postsData->fetch()) {
    
        ?>

        <h3><?= htmlspecialchars($post['title']) ?></h3>

        <p><em>Publié le <?= $post['creation_date_fr'] ?></em></p>

        <p>
            <?= nl2br(htmlspecialchars($post['preview'])) ?> [...]<br>
            <em><a href="index.php?action=seeEditPost&amp;postId=<?= $post['post_id'] ?>">Editer</a></em>
        <p>

        <?php

    }

    $postsData->closeCursor(); 


$content = ob_get_clean();

require('templateBackend.php'); 

?>