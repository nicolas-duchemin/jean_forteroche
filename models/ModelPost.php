<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelPost extends Model
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $postsData = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $postsData;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $postData = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $postData->execute(array($postId));
        
        $post = $postData->fetch();
        return $post;
    }

    public function getLastPost()
    {
        $db = $this->dbConnect();
        $lastPostData = $db->query('SELECT id, title, SUBSTRING(content, 1, 500) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        $lastPost = $lastPostData->fetch();
        return $lastPost;
    }
}