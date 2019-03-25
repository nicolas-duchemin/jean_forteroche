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
            <p><?= preg_replace('#(http|https)://[a-z0-9._/\-=?&;]+#i', '<a href="$0" target="_blank">$0</a>', nl2br(htmlspecialchars($reportedComment['comment']))) ?></p>
        </div>

        <p class="buttonArea">
            <a class="button" href="edition-chapitre-<?= $reportedComment['post_id'] ?>.html">Voir le chapitre associé</a>
        </p>    
        <?php
    }
    $reportedCommentsData->closeCursor();
    ?>

    <h3><br>DERNIERS COMMENTAIRES</h3>
    <?php 
    while ($lastComment = $lastCommentsData->fetch()) { 
        ?>
        <div class="flex">
            <h4><?= htmlspecialchars($lastComment['author']) ?></h4>
            <p class="date"><em>Posté le <?= $lastComment['comment_date_fr'] ?></em></p>
        </div>

        <div class="bloc">    
            <p><?= preg_replace('#(http|https)://[a-z0-9._/\-=?&;]+#i', '<a href="$0" target="_blank">$0</a>', nl2br(htmlspecialchars($lastComment['comment']))) ?></p>
        </div>
        
        <p class="buttonArea"><a class="button" href="edition-chapitre-<?= $lastComment['post_id'] ?>.html">Voir le chapitre associé</a></p>
        <?php
    }
    $lastCommentsData->closeCursor();
    
$content = ob_get_clean();
require('templateBackend.php'); 
?>