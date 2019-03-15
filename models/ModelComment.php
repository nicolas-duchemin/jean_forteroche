<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelComment extends Model
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $commentsData = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $commentsData->execute(array($postId));

        return $commentsData;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $commentData = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE id = ?');
        $commentData->execute(array($commentId));
        
        $comment = $commentData->fetch();
        return $comment;
    }

    public function setComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $executedQuery = $query->execute(array($postId, $author, $comment));

        return $executedQuery;
    }

    public function editComment($author, $comment, $commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments SET author = ?, comment = ? WHERE id = ?');
        date_default_timezone_set('Europe/Paris');
        $commentWithEditDate = $comment . "\n\n" . '[modifié le ' . date('d/m/Y à H\hi\m\i\ns\s]');
        $executedQuery = $query->execute(array($author, $commentWithEditDate, $commentId));

        return $executedQuery;
    }
}