<?php
require('controllers/controllerFrontend.php');
require('controllers/controllerBackend.php');

try {
    
    if (isset($_GET['action'])) {
        
        if ($_GET['action'] == 'seeHome') {
            seeHome();

        } elseif ($_GET['action'] == 'seeListPosts') {
            seeListPosts();

        } elseif ($_GET['action'] == 'seePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                seePost();
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }

        } elseif ($_GET['action'] == 'seeAuthor') {
            seeAuthor();

        } elseif ($_GET['action'] == 'login') {
            login();






        } elseif ($_GET['action'] == 'inscription') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                addUser($_POST['username'], $_POST['password']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
            
        } elseif ($_GET['action'] == 'connection') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                verifyUser($_POST['username'], $_POST['password']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }







        } elseif ($_GET['action'] == 'seeComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                seeComment();
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }

        } elseif ($_GET['action'] == 'editComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    editComment($_GET['postId'], $_POST['author'], $_POST['comment'], $_GET['id']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre ou de commentaire envoyé');
            }
        }

    } else {
        seeHome();
    }
    
} catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('views/viewError.php');
}