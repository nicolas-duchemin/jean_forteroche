<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>

<?php $data = $comment->fetch(); ?>

<h1>Mon super blog</h1>

<p><a href="index.php?action=post&amp;id=<?= $data['post_id'] ?>">Retour au billet</a></p>

<h2>Commentaire</h2>

<p><strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['comment_date_fr'] ?></p>

<p class="textComment"><?= nl2br(htmlspecialchars($data['comment'])) ?><br></p>

<form action="index.php?action=editComment&amp;id=<?= $data['id'] ?>&amp;postId=<?= $data['post_id'] ?>" method="post">
    <fieldset>
    	<legend>Modifier le commentaire</legend>
	    <p><label for="author">Auteur</label> <input type="text" id="author" name="author" size="58" value="<?= $data['author'] ?>" /></p> 
        <p><label for="comment">Commentaire</label></p>
        <p><textarea id="comment" name="comment" cols="50"><?= $data['comment'] ?></textarea></p>
        <p><input type="submit" /></p>
	</fieldset>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>