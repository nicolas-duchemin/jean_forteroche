<?php
require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

function seeDashboard()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelComment = new \NWC\Forteroche\Models\ModelComment();
        $lastCommentsData = $modelComment->getLastComments();
        $reportedCommentsData = $modelComment->getReportedComments();
        require('views/backend/viewDashboard.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }    
}

function seeAddPost()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        require('views/backend/viewAddPost.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

function addPost($title, $content)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelPost = new \NWC\Forteroche\Models\ModelPost();
        $executedQuery = $modelPost->setPost($title, $content);

        if ($executedQuery === false) {
            throw new Exception('Impossible d\'ajouter le chapitre !');
        } else {
            header('Location: index.php?action=seeEditPosts');
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

function seeEditPosts()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelPost = new \NWC\Forteroche\Models\ModelPost();
        $postsData = $modelPost->getPosts();
        require('views/backend/viewEditPosts.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

function seeEditPost($postId)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelPost = new \NWC\Forteroche\Models\ModelPost();
        $post = $modelPost->getPost($postId);
        $modelComment = new \NWC\Forteroche\Models\ModelComment();
        $commentsData = $modelComment->getComments($postId);
        require('views/backend/viewEditPost.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }       
}

function editPost($postId, $title, $content)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelPost = new \NWC\Forteroche\Models\ModelPost();
        $executedQuery = $modelPost->editPost($postId, $title, $content);

        if ($executedQuery === false) {
            throw new Exception('Impossible d\'ajouter le chapitre modifié !');
        } else {
            header('Location: index.php?action=seeEditPost&postId=' . $postId);
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }       
}

function seeRemovePost($postId)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        require('views/backend/viewRemovePost.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

function removePost($postId)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelPost = new \NWC\Forteroche\Models\ModelPost();
        $executedQuery = $modelPost->removePost($postId);

        if ($executedQuery === false) {
            throw new Exception('Impossible de supprimer le chapitre !');
        } else {
            header('Location: index.php?action=seeEditPosts');
        }
        $modelComment = new \NWC\Forteroche\Models\ModelComment();
        $executedReq = $modelComment->removeComments($postId);

        if ($executedReq === false) {
            throw new Exception('Impossible de supprimer les commentaires associés au chapitre !');
        } else {
            header('Location: index.php?action=seeEditPosts');
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }       
}

function editComment($postId, $author, $comment, $commentId)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelComment = new \NWC\Forteroche\Models\ModelComment();
        $executedQuery = $modelComment->editComment($author, $comment, $commentId);

        if ($executedQuery === false) {
            throw new Exception('Impossible d\'ajouter le commentaire modifié !');
        } else {
            header('Location: index.php?action=seeEditPost&postId=' . $postId);
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }      
}

function removeComment($commentId, $postId)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $modelComment = new \NWC\Forteroche\Models\ModelComment();
        $executedQuery = $modelComment->removeComment($commentId);

        if ($executedQuery === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        } else {
            header('Location: index.php?action=seeEditPost&postId=' . $postId);
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }     
}

function seeSettings()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        require('views/backend/viewSettings.php');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

function editUsername($newUsernameOne)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $executedQuery = $modelUser->editUser($newUsernameOne, $_SESSION['password']);

        if ($executedQuery === false) {
            throw new Exception('Impossible de modifier votre identifiant !');
        } else {
            signOut();
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }   
}

function editPassword($newPasswordOne)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);

    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        $executedQuery = $modelUser->editUser($_SESSION['username'], $newPasswordOne);

        if ($executedQuery === false) {
            throw new Exception('Impossible de modifier votre mot de passe !');
        } else {
            signOut();
        }
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }   
}

function signOut()
{
    session_unset(); // supprime les variables de session
    session_destroy(); // supprime la session 
    header('Location: index.php?action=seeHome');
}