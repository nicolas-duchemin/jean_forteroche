<?php
namespace Forteroche\Models;

require_once("models/Model.php");

/**
 * Manipulation des données concernant les chapitres
 */
class ModelPost extends Model
{
    private $_db;

    public function __construct()
    {
        $this->_db = parent::dbConnect();
    }

    // GETTERS

    // Récupération des chapitres (extrait)
    public function getPosts()
    {
        $postsData = $this->_db->query('SELECT post_id, title, SUBSTRING(content, 1, 450) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM posts ORDER BY creation_date DESC');

        return $postsData;
    }

    // Récupération d'un chapitre
    public function getPost($postId)
    {
        $postData = $this->_db->prepare('SELECT post_id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM posts WHERE post_id = ?');
        $postData->execute(array($postId));
        
        $post = $postData->fetch();
        return $post;
    }

    // Récupération du dernier chapitre (extrait)
    public function getLastPost()
    {
        $lastPostData = $this->_db->query('SELECT post_id, title, SUBSTRING(content, 1, 450) AS preview, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, DATE_FORMAT(update_date, \'%d/%m/%Y à %Hh%imin%ss\') AS update_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 1');

        $lastPost = $lastPostData->fetch();
        return $lastPost;
    }

    // SETTERS

    // Ajout d'un chapitre à la bdd
    public function setPost($title, $content)
    {
        $query = $this->_db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $executedQuery = $query->execute(array($title, $content));

        return $executedQuery;
    }

    // Modification d'un chapitre
    public function editPost($postId, $title, $content)
    {
        $query = $this->_db->prepare('UPDATE posts SET title = ?, content = ?, update_date = NOW() WHERE post_id = ?');
        $executedQuery = $query->execute(array($title, $content, $postId));

        return $executedQuery;
    }

    // Suppression d'un chapitre
    public function removePost($postId)
    {
        $query = $this->_db->prepare('DELETE FROM posts WHERE post_id = ?');
        $executedQuery = $query->execute(array($postId));

        return $executedQuery;
    }
}