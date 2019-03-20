<?php 

$title = 'Tableau de bord';

ob_start(); 

    ?>

    <h3>COMMENTAIRES SIGNALÉS</h3>

    <?php 

    while ($reportedComment = $reportedCommentsData->fetch()) {
        ?>
        <div class="flex">
            <h4><?= htmlspecialchars($reportedComment['author']) ?></h4>
            <div class="flex">
                <p class="date"><em>Posté le <?= $reportedComment['comment_date_fr'] ?></em></p>
                <p class="reportingInfo">Commentaire signalé</p>
            </div>
        </div>

        <div class="bloc">    
            <p><?= nl2br(htmlspecialchars($reportedComment['comment'])) ?></p>
        </div>

        <p class="buttonArea"><a class="button" href="index.php?action=seeEditPost&amp;postId=<?= $reportedComment['post_id'] ?>">Voir le chapitre associé</a></p>    
        <?php
    }

    ?>

    <h3>DERNIERS COMMENTAIRES</h3>

    <?php 

    while ($lastComment = $lastCommentsData->fetch()) { 
        ?>
        <div class="flex">
            <h4><?= htmlspecialchars($lastComment['author']) ?></h4>
            <p class="date"><em>Posté le <?= $lastComment['comment_date_fr'] ?></em></p>
        </div>

        <div class="bloc">    
            <p><?= nl2br(htmlspecialchars($lastComment['comment'])) ?></p>
        </div>
        
        <p class="buttonArea"><a class="button" href="index.php?action=seeEditPost&amp;postId=<?= $lastComment['post_id'] ?>">Voir le chapitre associé</a></p>
        <?php
    }

    $lastCommentsData->closeCursor();
    
$content = ob_get_clean();

require('templateBackend.php'); 

?>