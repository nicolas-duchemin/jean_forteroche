<?php 
$title = htmlspecialchars($post['title']); 
ob_start();

    ?> 
    <div class="flex">
        <h3><?= htmlspecialchars($post['title']) ?></h3>
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
        <p><?= preg_replace('#(http|https)://[a-z0-9._/\-=?&;]+#i', '<a href="$0" target="_blank">$0</a>', $post['content']) ?></p> <!-- pas d'échappement htmlspecialchars ici (mise en page TinyMCE)-->
    </div>

    <h4>LAISSER UN COMMENTAIRE</h4>

    <form action="index.php?action=addComment&amp;postId=<?= $post['post_id'] ?>" method="post">
        <div class="bloc">    
            <p><label for="author">Auteur</label></p>
            <p><input type="text" id="author" name="author" placeholder=" Votre nom"></p>
            <p><label for="comment">Commentaire</label></p>
            <p><textarea id="comment" name="comment" cols="50" placeholder=" Votre commentaire"></textarea></p>
        </div>
        <p class="buttonArea"><input class="button" type="submit" value="Envoyer"></p>
    </form>
    
    <?php
    while ($comment = $commentsData->fetch()) { 
        ?>
        <div class="flex">
            <h4><?= htmlspecialchars($comment['author']) ?></h4>
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
            <p>
                <?= preg_replace('#(http|https)://[a-z0-9._/\-=?&;]+#i', '<a href="$0" target="_blank">$0</a>', nl2br(htmlspecialchars($comment['comment']))) ?>
            </p>
        </div>

        <p>
            <?php
            if ($comment['reporting'] != 1) { 
                ?>
                <p class="buttonArea"><a class="button" href="index.php?action=reportComment&amp;commentId=<?= $comment['comment_id'] ?>&amp;postId=<?= $comment['post_id'] ?>">Signaler</a></p>
                <?php
            }
            ?>
        </p>
        <?php
    }  
    $commentsData->closeCursor();

$content = ob_get_clean();
require('template.php'); 
?>