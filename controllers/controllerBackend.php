<?php
namespace Forteroche\Controllers;

require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

use \Forteroche\Models\ModelPost;
use \Forteroche\Models\ModelComment;
use \Forteroche\Models\ModelUser;

/**
 * Gestion de la partie Backend
 */
class ControllerBackend
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

    // Affichage de la page 'Tableau de bord'
    public function seeDashboard($username, $password)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $lastCommentsData = $this->_modelComment->getLastComments();
            $reportedCommentsData = $this->_modelComment->getReportedComments();
            require('views/backend/viewDashboard.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }    
    }

    // Affichage de la page 'Rédaction d'un chapitre'
    public function seeAddPost($username, $password)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewAddPost.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    // Ajout d'un chapitre à la bdd
    public function addPost($username, $password, $title, $content)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelPost->setPost($title, $content);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le chapitre !');
            } else {
                header('Location: edition-chapitres.html');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    // Affichage de la page 'Edition des chapitres et commentaires'
    public function seeEditPosts($username, $password)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $postsData = $this->_modelPost->getPosts();
            require('views/backend/viewEditPosts.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    // Affichage d'un chapitre en mode éditeur
    public function seeEditPost($username, $password, $postId)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $post = $this->_modelPost->getPost($postId);
            $commentsData = $this->_modelComment->getComments($postId);
            if (!empty($post)) {
                require('views/backend/viewEditPost.php');
            } else {
                throw new \Exception('Numéro de chapitre inconnue');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    // Edition d'un chapitre
    public function editPost($username, $password, $postId, $title, $content)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelPost->editPost($postId, $title, $content);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le chapitre modifié !');
            } else {
                header('Location: edition-chapitre-' . $postId . '.html');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    // Affichage de la page 'Supprimer un chapitre'
    public function seeRemovePost($username, $password, $postId)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewRemovePost.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    // Suppression d'un chapitre et de ses commentaires
    public function removePost($username, $password, $postId)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelPost->removePost($postId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de supprimer le chapitre !');
            } else {
                header('Location: edition-chapitres.html');
            }
            
            $executedReq = $this->_modelComment->removeComments($postId);

            if ($executedReq === false) {
                throw new \Exception('Impossible de supprimer les commentaires associés au chapitre !');
            } else {
                header('Location: edition-chapitres.html');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }       
    }

    // Modification d'un commentaire
    public function editComment($username, $password, $postId, $author, $comment, $commentId)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelComment->editComment($author, $comment, $commentId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible d\'ajouter le commentaire modifié !');
            } else {
                header('Location: edition-chapitre-' . $postId . '.html');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }      
    }

    // Suppression d'un commentaire
    public function removeComment($username, $password, $commentId, $postId)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelComment->removeComment($commentId);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de supprimer le commentaire !');
            } else {
                header('Location: edition-chapitre-' . $postId . '.html');
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }     
    }

    // Affichage de la page 'Paramètres de connexion'
    public function seeSettings($username, $password)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            require('views/backend/viewSettings.php');
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }
    }

    // Modification de l'identifiant
    public function editUsername($username, $password, $newUsernameOne)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelUser->editUser($newUsernameOne, $password);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de modifier votre identifiant !');
            } else {
                $this->signOut();
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }   
    }

    // Modification du mot de passe
    public function editPassword($username, $password, $newPasswordOne)
    {
        $user = $this->_modelUser->getUser($username);

        if (password_verify($password, $user['password_hash'])) {
            $executedQuery = $this->_modelUser->editUser($username, $newPasswordOne);

            if ($executedQuery === false) {
                throw new \Exception('Impossible de modifier votre mot de passe !');
            } else {
                $this->signOut();
            }
        } else {
            throw new \Exception('L\'identifiant ou le mot de passe est invalide !');
        }   
    }

    // Déconnexion
    public function signOut()
    {
        session_unset(); // supprime les variables de session
        session_destroy(); // supprime la session 
        header('Location: accueil.html');
    }
}