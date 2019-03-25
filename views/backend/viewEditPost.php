<?php 
$title = 'Édition du ' . htmlspecialchars($post['title']) . ' et de ses commentaires'; 
ob_start(); 

    ?>
    <form action="index.php?action=editPost&amp;postId=<?= $post['post_id'] ?>" method="post">
        <div class="flex">
            <p>
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value="<?= strtoupper(htmlspecialchars($post['title'])) ?>">
            </p>
            <p class="date">
                <em>Publié le <?= $post['creation_date_fr'] ?></em>
                <?php
                if ($post['update_date_fr']) { 
                    ?>
                    <em>- Édité le <?= $post['update_date_fr'] ?></em>
                    <?php
                } 
                ?>
            </p>
        </div>

        <div class="bloc">
            <p><label for="content">Contenu</label></p>
            <p><textarea id="content" name="content" rows="50"><?= htmlspecialchars($post['content']) ?></textarea></p>
        </div>

        <p class="buttonArea">
            <input class="button" type="submit" value="Enregistrer la modification"> <a class="button" href="suppression-chapitre-<?= $post['post_id'] ?>.html">Supprimer&nbsp;le&nbsp;chapitre</a>
        </p>
    </form>

    <h3>COMMENTAIRES</h3>

    <?php 
    while ($comment = $commentsData->fetch()) { 
        ?> 
        <form action="index.php?action=editComment&amp;commentId=<?= $comment['comment_id'] ?>&amp;postId=<?= $comment['post_id'] ?>" method="post">
            <div class="flex">
                <p>
                    <label for="author">Auteur</label>
                    <input type="text" id="author" name="author" value="<?= htmlspecialchars($comment['author']) ?>">
                </p>
                <div class="flex">
                    <p class="date"><em>Posté le <?= $comment['comment_date_fr'] ?></em></p>
                    <?php 
                    if ($comment['reporting'] == 1) { 
                        ?>
                        <p class="reportingInfo">Commentaire signalé</p>
                        <?php 
                    } 
                    ?>
                </div>
            </div>

            <div class="bloc"> 
                <p><label for="comment">Commentaire</label></p>
                <p><textarea id="comment" name="comment" rows="5"><?= htmlspecialchars($comment['comment']) ?></textarea></p>
            </div>

            <p class="buttonArea">
                <input class="button" type="submit" value="Enregistrer la modification"> <a class="button" href="index.php?action=removeComment&amp;commentId=<?= $comment['comment_id'] ?>&amp;postId=<?= $comment['post_id'] ?>">Supprimer&nbsp;le&nbsp;commentaire</a>
            </p>
        </form>   
        <?php
    }
    $commentsData->closeCursor();

$content = ob_get_clean();
require('templateBackend.php'); 
?>