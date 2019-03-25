<?php 
$title = 'Le nouveau roman de Jean Forteroche';
ob_start(); 

    ?>
    <h3>DESCRIPTION DU ROMAN</h3>
    <div class="bloc">
        <p><em> « Laissez-moi vous conter une histoire, vous dévoiler un chapitre secret de ma vie, une page que j’avais enterrée au fin fond de moi-même. Écoutez-moi patiemment, et ne m’interrompez pas ! »</em></p>
        <p>Billet simple pour l'Alaska relate l’histoire de 24 voyageurs bloqués dans un train en raison d’une tempête de neige. Combien de temps faudra-t-il avant qu’ils ne sombrent dans la folie ? Vous le saurez en lisant le nouveau roman en ligne de Jean Forteroche.</p>
        <p>N’attendez plus ! Découvrez vite l'effroyable aventure de ces 24 voyageurs en Alaska...</p>
    </div>

    <div class="flex">
        <h3><br>DERNIER CHAPITRE : <?= htmlspecialchars($lastPost['title']) ?></h3> 
        <p class="date">
            <em>Publié le <?= $lastPost['creation_date_fr'] ?></em>
            <?php 
            if ($lastPost['update_date_fr']) {
                ?>
                <em>- Édité le <?= $lastPost['update_date_fr'] ?></em>
                <?php
            } 
            ?>
        </p>
    </div>

    <div class="bloc">
        <p><?= $lastPost['preview'] ?> [...]</p> <!-- pas d'échappement htmlspecialchars ici (mise en page TinyMCE)-->
    </div>

    <p class="buttonArea"><a class="button" href="chapitre-<?= $lastPost['post_id'] ?>.html">Lire la suite</a></p>    
    <?php 

$content = ob_get_clean();
require('template.php'); 
?>