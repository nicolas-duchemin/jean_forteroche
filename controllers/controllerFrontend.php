<?php
require_once('models/ModelPost.php');
require_once('models/ModelComment.php');

function seeHome()
{
    $modelPost = new \NWC\Forteroche\Models\ModelPost();
    $lastPost = $modelPost->getLastPost();

    require('views/frontend/viewHome.php');
}

function seeListPosts()
{
    $modelPost = new \NWC\Forteroche\Models\ModelPost();
    $postsData = $modelPost->getPosts();

    require('views/frontend/viewListPosts.php');
}

function seePost()
{
    $modelPost = new \NWC\Forteroche\Models\ModelPost();
    $post = $modelPost->getPost($_GET['id']);
    
    $modelComment = new \NWC\Forteroche\Models\ModelComment();
    $commentsData = $modelComment->getComments($_GET['id']);

    require('views/frontend/viewPost.php');
}

function addComment($postId, $author, $comment)
{
    $modelComment = new \NWC\Forteroche\Models\ModelComment();
    $executedQuery = $modelComment->setComment($postId, $author, $comment);

    if ($executedQuery === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=seePost&id=' . $postId);
    }
}

function seeAuthor()
{
    require('views/frontend/viewAuthor.php');
}

function login()
{
    require('views/frontend/viewConnection.php');
}