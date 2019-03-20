<?php
namespace NWC\Forteroche\Controllers;

require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

use \NWC\Forteroche\Models\ModelPost;
use \NWC\Forteroche\Models\ModelComment;
use \NWC\Forteroche\Models\ModelUser;

class ControllerFrontend
{
    public function seeHome()
    {
        $modelPost = new ModelPost();
        $lastPost = $modelPost->getLastPost();

        require('views/frontend/viewHome.php');
    }

    public function seeListPosts()
    {
        $modelPost = new ModelPost();
        $postsData = $modelPost->getPosts();

        require('views/frontend/viewListPosts.php');
    }

    public function seePost($postId)
    {
        $modelPost = new ModelPost();
        $post = $modelPost->getPost($_GET['postId']);
        
        $modelComment = new ModelComment();
        $commentsData = $modelComment->getComments($_GET['postId']);

        require('views/frontend/viewPost.php');
    }

    public function addComment($postId, $author, $comment)
    {
        $modelComment = new ModelComment();
        $executedQuery = $modelComment->setComment($postId, $author, $comment);

        if ($executedQuery === false) {
            throw new \Exception('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?action=seePost&postId=' . $postId);
        }
    }

    public function reportComment($commentId, $postId)
    {
        $modelComment = new ModelComment();
        $executedQuery = $modelComment->reportComment($commentId);

        if ($executedQuery === false) {
            throw new \Exception('Impossible de signaler le commentaire !');
        } else {
            header('Location: index.php?action=seePost&postId=' . $postId);
        }
    }

    public function seeAuthor()
    {
        require('views/frontend/viewAuthor.php');
    }

    public function seeSignIn()
    {
        require('views/frontend/viewSignIn.php');
    }

    public function signIn($username, $password)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('Location: index.php?action=seeDashboard');
    }

    /* Debugging *********************************

    public function addUser($username, $password)
    {
        $modelUser = new ModelUser();
        $executedQuery = $modelUser->setUser($username, $password);

        if ($executedQuery === false) {
            throw new \Exception('Impossible d\'ajouter l\'utilisateur !');
        } else {
            header('Location: index.php?action=seeHome');
        }
    }
    
    **********************************************/
}