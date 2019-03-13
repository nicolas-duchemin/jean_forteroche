<?php 

$title = 'Modifier un commentaire'; 

ob_start(); 

	?>

	<p><a href="index.php?action=post&amp;id=<?= $comment['post_id'] ?>">Retour au billet</a></p>

	<h2>Commentaire</h2>

	<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>

	<p><?= nl2br(htmlspecialchars($comment['comment'])) ?><br></p>

	<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>&amp;postId=<?= $comment['post_id'] ?>" method="post">
	    <fieldset>
	    	<legend>Modifier le commentaire</legend>
		    <p><label for="author">Auteur</label> <input type="text" id="author" name="author" size="58" value="<?= $comment['author'] ?>" /></p> 
	        <p><label for="comment">Commentaire</label></p>
	        <p><textarea id="comment" name="comment" cols="50"><?= $comment['comment'] ?></textarea></p>
	        <p><input type="submit" /></p>
		</fieldset>
	</form>

	<?php 

$content = ob_get_clean();

require('template.php'); ?>