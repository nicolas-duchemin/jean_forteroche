<?php
namespace Forteroche\Controllers;

require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

use \Forteroche\Models\ModelPost;
use \Forteroche\Models\ModelComment;
use \Forteroche\Models\ModelUser;

/**
 * Gestion de la partie Frontend
 */
class ControllerFrontend
{
    private $_modelPost;
    private $_modelComment;
    private $_modelUser;

    public function __construct()
    {
        $this->_modelPost = new ModelPost();
        $this->_modelComment = new ModelComment();
        $this->_modelUser = new ModelUser();
    }

    // Affichage de la page 'Accueil'
    public function seeHome()
    {
        $lastPost = $this->_modelPost->getLastPost();

        require('views/frontend/viewHome.php');
    }

    // Affichage de la page 'Liste des chapitres'
    public function seeListPosts()
    {
        $postsData = $this->_modelPost->getPosts();

        require('views/frontend/viewListPosts.php');
    }

    // Affichage d'un chapitre
    public function seePost($postId)
    {
        $post = $this->_modelPost->getPost($postId);
        $commentsData = $this->_modelComment->getComments($postId);

        if (!empty($post)) {
            require('views/frontend/viewPost.php');
        } else {
            throw new \Exception('Numéro de chapitre inconnue');
        }
    }

    // Ajout d'un commentaire
    public function addComment($postId, $author, $comment)
    {
        $executedQuery = $this->_modelComment->setComment($postId, $author, $comment);

        if ($executedQuery === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: chapitre-' . $postId . '.html');
        }
    }

    // Signalement d'un commentaire
    public function reportComment($commentId, $postId)
    {
        $executedQuery = $this->_modelComment->reportComment($commentId);

        if ($executedQuery === false) {
            throw new \Exception('Impossible de signaler le commentaire !');
        } else {
            header('Location: chapitre-' . $postId . '.html');
        }
    }

    // Affichage de la page 'Auteur'
    public function seeAuthor()
    {
        require('views/frontend/viewAuthor.php');
    }

    // Affichage de la page 'Administration'
    public function seeSignIn()
    {
        require('views/frontend/viewSignIn.php');
    }

    // Connexion
    public function signIn($username, $password)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: tableau-de-bord.html');
    }

    /* Debugging *********************************

    // Inscription
    public function addUser($username, $password)
    {
        $executedQuery = $this->_modelUser->setUser($username, $password);

        if ($executedQuery === false) {
            throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
        } else {
            header('Location: accueil.html');
        }
    }
    
    **********************************************/
}