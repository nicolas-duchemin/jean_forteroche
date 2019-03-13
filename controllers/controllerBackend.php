<?php
require_once('models/ModelPost.php');
require_once('models/ModelComment.php');
require_once('models/ModelUser.php');

function addUser($username, $password)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $executedQuery = $modelUser->setUser($username, $password);

    if ($executedQuery === false) {
        throw new Exception('Impossible d\'ajouter l\'utilisateur !');
    } else {
        header('Location: index.php?action=seeHome');
    }
}

function verifyUser($username, $password)
{
    $modelUser = new \NWC\Forteroche\Models\ModelUser();
    $user = $modelUser->getUser($username);

    if (password_verify($password, $user['password_hash'])) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php?action=seeHome');
    } else {
        throw new Exception('L\'identifiant ou le mot de passe est invalide !');
    }
}

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