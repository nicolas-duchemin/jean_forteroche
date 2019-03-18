<?php 

$title = htmlspecialchars($post['title']); 

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <h2><?= htmlspecialchars($post['title']) ?></h2>

    <p>
        <em>Publié le <?= $post['creation_date_fr'] ?></em>
        <?php 
            if ($post['update_date_fr']) {
            ?><em>- Édité le <?= $post['update_date_fr'] ?></em><?php
            } 
        ?>
    </p>

    <p><?= $post['content'] ?></p>

    <h3>Commentaires</h3>

    <form action="index.php?action=addComment&amp;postId=<?= $post['post_id'] ?>" method="post">
        <fieldset>
            <legend>Laisser un commentaire</legend> 
            <p><label for="author">Auteur</label> <input type="text" id="author" name="author" size="58" /></p>
            <p><label for="comment">Commentaire</label></p>
            <p><textarea id="comment" name="comment" cols="50"></textarea></p>
            <p><input type="submit" value="Envoyer"></p>
        </fieldset>
    </form>

    <?php

    while ($comment = $commentsData->fetch()) {
        
        ?><p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> <?php

        if ($comment['reporting'] == 1) {
                echo "Signalé !";
        } else {
            ?>(<a href="index.php?action=reportComment&amp;commentId=<?= $comment['comment_id'] ?> &amp;postId=<?= $comment['post_id'] ?>">Signaler</a>)</p><?php
        }

        ?><p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p><?php
    }

    $commentsData->closeCursor();

$content = ob_get_clean();

require('template.php'); ?>