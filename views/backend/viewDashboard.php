<?php 

$title = 'Tableau de bord';

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2>TABLEAU DE BORD</h2>

    <h3>Derniers commentaires</h3>

    <?php 

    while ($lastComment = $lastCommentsData->fetch()) {
            ?>
            <p><strong><?= htmlspecialchars($lastComment['author']) ?></strong> le <?= $lastComment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($lastComment['comment'])) ?></p>
            <p><em><a href="index.php?action=seeEditPost&amp;postId=<?= $lastComment['post_id'] ?>">Voir</a></em></p>
            <?php        
    }

    $lastCommentsData->closeCursor();

    ?>

    <h3>Commentaires signalés</h3>

    <?php 

    while ($reportedComment = $reportedCommentsData->fetch()) {
        ?>
        <p><strong><?= htmlspecialchars($reportedComment['author']) ?></strong> le <?= $reportedComment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($reportedComment['comment'])) ?></p>
        <p><em><a href="index.php?action=seeEditPost&amp;postId=<?= $reportedComment['post_id'] ?>">Voir</a></em></p>
        <?php
    }

$content = ob_get_clean();

require('templateBackend.php'); 

?>