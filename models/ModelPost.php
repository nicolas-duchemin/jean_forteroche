<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelPost extends Model
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $postsData = $db->query('SELECT post_id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC');

        return $postsData;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $postData = $db->prepare('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM posts WHERE post_id = ?');
        $postData->execute(array($postId));
        
        $post = $postData->fetch();
        return $post;
    }

    public function getLastPost()
    {
        $db = $this->dbConnect();
        $lastPostData = $db->query('SELECT post_id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        $lastPost = $lastPostData->fetch();
        return $lastPost;
    }

    public function setPost($title, $content)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())') or die(print_r($db->errorInfo()));
        $executedQuery = $query->execute(array($title, $content));

        return $executedQuery;
    }

    public function editPost($postId, $title, $content)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE posts SET title = ?, content = ?, update_date = NOW() WHERE post_id = ?');
        $executedQuery = $query->execute(array($title, $content, $postId));

        return $executedQuery;
    }

    public function removePost($postId)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('DELETE FROM posts WHERE post_id = ?');
        $executedQuery = $query->execute(array($postId));

        return $executedQuery;
    }
}