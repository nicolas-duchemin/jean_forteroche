<?php 

$title = 'Le nouveau roman de Jean Forteroche';

ob_start(); 

    ?>

    <h3>Description du roman</h3>

    <div class="bloc">
        <p>
            Bloqués par la neige, la folie les guette ! Ou bien est-ce la folie à l'origine de tout ?<br>
            Découvrez l'effroyable aventure de 24 voyageurs perdus dans les plaines de l'Alaska...
        </p>
    </div>

    <div class="flex">
        <h3>Dernier chapitre : <?= htmlspecialchars($lastPost['title']) ?></h3> 
        <p class="date">
            <em>Publié le <?= $lastPost['creation_date_fr'] ?></em>
            <?php 
            if ($lastPost['update_date_fr']) {
                ?><em>- Édité le <?= $lastPost['update_date_fr'] ?></em><?php
            } 
            ?>
        </p>
    </div>

    <div class="bloc">
        <p><?= $lastPost['preview'] ?> [...]</p>
    </div>

    <p class="buttonArea"><a class="button" href="index.php?action=seePost&amp;postId=<?= $lastPost['post_id'] ?>">Lire la suite</a></p>
    
    <?php 

$content = ob_get_clean();

require('template.php'); 

?>