<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<h1>Mon super blog</h1>

<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <fieldset>
        <legend>Laisser un commentaire</legend> 
        <p><label for="author">Auteur</label> <input type="text" id="author" name="author" size="58" /></p>
        <p><label for="comment">Commentaire</label></p>
        <p><textarea id="comment" name="comment" cols="50"></textarea></p>
        <p><input type="submit" /></p>
    </fieldset>
</form>

<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> (<a href="index.php?action=comment&amp;id=<?= $comment['id'] ?>">modifier</a>)</p>
    <p class="textComment"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>