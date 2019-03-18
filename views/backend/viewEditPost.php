<?php 

$title = htmlspecialchars($post['title']); 

ob_start(); 

    ?>

    <h1>BILLET SIMPLE POUR L'ALASKA</h1>

    <form action="index.php?action=editPost&amp;postId=<?= $post['post_id'] ?>" method="post">
        <p><input type="text" id="title" name="title" value="<?= strtoupper(htmlspecialchars($post['title'])) ?>"></p>
        <p><em>Publié le <?= $post['creation_date_fr'] ?></em>
        <?php 
            if ($post['update_date_fr']) {
            ?><em>- Édité le <?= $post['update_date_fr'] ?></em><?php
            } 
        ?>
        </p>
        <p><textarea id="content" name="content" rows="50" cols="100"><?= nl2br(htmlspecialchars($post['content'])) ?></textarea></p>
        <p><input type="submit" value="Modifier"> <a href="index.php?action=seeRemovePost&amp;postId=<?= $post['post_id'] ?>">Supprimer</a></p>
    </form>

    <h3>Commentaires</h3>

    <?php

    while ($comment = $commentsData->fetch()) {
        ?> 
        <form action="index.php?action=editComment&amp;commentId=<?= $comment['comment_id'] ?>&amp;postId=<?= $comment['post_id'] ?>" method="post">
            <p>
                <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>"> le <?= $comment['comment_date_fr'] ?>
                <?php
                    if ($comment['reporting'] == 1) {
                        ?>Signalé !<?php
                    }
                ?>
            </p>
            <p><textarea id="comment" name="comment" rows="5" cols="60"><?= htmlspecialchars($comment['comment']) ?></textarea></p>
            <p><input type="submit" value="Modifier"> <a href="index.php?action=removeComment&amp;commentId=<?= $comment['comment_id'] ?>&amp;postId=<?= $comment['post_id'] ?>">Supprimer</a></p>
        </form>
        <?php
    }
    $commentsData->closeCursor();

$content = ob_get_clean();

require('templateBackend.php'); ?>