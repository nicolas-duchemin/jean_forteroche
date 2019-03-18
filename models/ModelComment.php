<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelComment extends Model
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $commentsData = $db->prepare('SELECT comment_id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, reporting FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $commentsData->execute(array($postId));

        return $commentsData;
    }

    public function getLastComments()
    {
        $db = $this->dbConnect();
        $lastCommentsData = $db->query('SELECT comment_id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE reporting=0 ORDER BY comment_date DESC LIMIT 0, 5');

        return $lastCommentsData;
    }

    public function getReportedComments()
    {
        $db = $this->dbConnect();
        $reportedCommentsData = $db->query('SELECT comment_id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr, reporting FROM comments WHERE reporting=1 ORDER BY comment_date DESC');

        return $reportedCommentsData;
    }

    public function setComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date, reporting) VALUES(?, ?, ?, NOW(), 0)');
        $executedQuery = $query->execute(array($postId, $author, $comment));

        return $executedQuery;
    }

    public function editComment($author, $comment, $commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments SET author = ?, comment = ?, reporting = ? WHERE comment_id = ?');
        date_default_timezone_set('Europe/Paris');
        $commentWithEditDate = $comment . "\n\n" . '[Edité par le modérateur le ' . date('d/m/Y à H\hi\m\i\ns\s]');
        $executedQuery = $query->execute(array($author, $commentWithEditDate, 0, $commentId));

        return $executedQuery;
    }

    public function removeComment($commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE comment_id = ?');
        $executedQuery = $query->execute(array($commentId));

        return $executedQuery;
    }

    public function removeComments($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM comments WHERE post_id = ?');
        $executedQuery = $query->execute(array($postId));

        return $executedReq;
    }

    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE comments SET reporting = ? WHERE comment_id = ?');
        $executedQuery = $query->execute(array(1, $commentId));

        return $executedQuery;
    }
}