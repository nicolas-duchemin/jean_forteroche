<?php
require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

function seeDashboard()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);
    if (password_verify($_SESSION['password'], $user['password_hash'])) {
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

function seeEditPosts()
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($_SESSION['username']);
    if (password_verify($_SESSION['password'], $user['password_hash'])) {
        require('views/backend/viewEditPosts.php');
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

function signOut()
{
    session_unset(); // supprime les variables de session
    session_destroy(); // supprime la session 
    header('Location: index.php?action=seeHome');
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

/* A supprimer ? 

function seeComment()
{
    $modelComment = new \NWC\Forteroche\Models\ModelComment();
    $comment = $modelComment->getComment($_GET['id']);

    require('views/frontend/viewComment.php');
}

function editComment($postId, $author, $comment, $commentId)
{
	$modelComment = new \NWC\Forteroche\Models\ModelComment();
    $executedQuery = $modelComment->editComment($author, $comment, $commentId);

    if ($executedQuery === false) {
        throw new Exception('Impossible d\'ajouter le commentaire modifié !');
    } else {
        header('Location: index.php?action=seePost&id=' . $postId);
    }
}

*/