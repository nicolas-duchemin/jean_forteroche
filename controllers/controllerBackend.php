<?php
namespace NWC\Forteroche\Controllers;

require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

use \NWC\Forteroche\Models\ModelPost;
use \NWC\Forteroche\Models\ModelComment;
use \NWC\Forteroche\Models\ModelUser;

class ControllerBackend
{
    public function seeDashboard($username, $password)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelComment = new ModelComment();
            $lastCommentsData = $modelComment->getLastComments();
            $reportedCommentsData = $modelComment->getReportedComments();
            require('views/backend/viewDashboard.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }    
    }

    public function seeAddPost($username, $password)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewAddPost.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    public function addPost($username, $password, $title, $content)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelPost = new ModelPost();
            $executedQuery = $modelPost->setPost($title, $content);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le chapitre !');
            } else {
                header('Location: index.php?action=seeEditPosts');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    public function seeEditPosts($username, $password)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelPost = new ModelPost();
            $postsData = $modelPost->getPosts();
            require('views/backend/viewEditPosts.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    public function seeEditPost($username, $password, $postId)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelPost = new ModelPost();
            $post = $modelPost->getPost($postId);
            $modelComment = new ModelComment();
            $commentsData = $modelComment->getComments($postId);
            if (!empty($post)) {
                require('views/backend/viewEditPost.php');
            } else {
                throw new \Exception('Numéro de chapitre inconnue');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    public function editPost($username, $password, $postId, $title, $content)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelPost = new ModelPost();
            $executedQuery = $modelPost->editPost($postId, $title, $content);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le chapitre modifié !');
            } else {
                header('Location: index.php?action=seeEditPost&postId=' . $postId);
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    public function seeRemovePost($username, $password, $postId)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewRemovePost.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    public function removePost($username, $password, $postId)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelPost = new ModelPost();
            $executedQuery = $modelPost->removePost($postId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de supprimer le chapitre !');
            } else {
                header('Location: index.php?action=seeEditPosts');
            }
            $modelComment = new ModelComment();
            $executedReq = $modelComment->removeComments($postId);

            if ($executedReq === false) {
                throw new \Exception('Impossible de supprimer les commentaires associés au chapitre !');
            } else {
                header('Location: index.php?action=seeEditPosts');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    public function editComment($username, $password, $postId, $author, $comment, $commentId)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelComment = new ModelComment();
            $executedQuery = $modelComment->editComment($author, $comment, $commentId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le commentaire modifié !');
            } else {
                header('Location: index.php?action=seeEditPost&postId=' . $postId);
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }      
    }

    public function removeComment($username, $password, $commentId, $postId)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $modelComment = new ModelComment();
            $executedQuery = $modelComment->removeComment($commentId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de supprimer le commentaire !');
            } else {
                header('Location: index.php?action=seeEditPost&postId=' . $postId);
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }     
    }

    public function seeSettings($username, $password)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewSettings.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    public function editUsername($username, $password, $newUsernameOne)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $modelUser->editUser($newUsernameOne, $password);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de modifier votre identifiant !');
            } else {
                $this->signOut();
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }   
    }

    public function editPassword($username, $password, $newPasswordOne)
    {
        $modelUser = new ModelUser();
        $user = $modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $modelUser->editUser($username, $newPasswordOne);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de modifier votre mot de passe !');
            } else {
                $this->signOut();
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }   
    }

    public function signOut()
    {
        session_unset(); // supprime les variables de session
        session_destroy(); // supprime la session 
        header('Location: index.php?action=seeHome');
    }
}