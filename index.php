<?php
session_start();
require_once('controllers/ControllerFrontend.php');
require_once('controllers/ControllerBackend.php');

use \NWC\Forteroche\Controllers\ControllerFrontend;
use \NWC\Forteroche\Controllers\ControllerBackend;

try {
    
    if (isset($_GET['action'])) {
        
    /* Front End Router */

        if ($_GET['action'] == 'seeHome') {
            $controllerFrontend = new ControllerFrontend();
            $controllerFrontend->seeHome();

        } elseif ($_GET['action'] == 'seeListPosts') {
            $controllerFrontend = new ControllerFrontend();
            $controllerFrontend->seeListPosts();
        
        } elseif ($_GET['action'] == 'seePost') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                $controllerFrontend = new ControllerFrontend();
                $controllerFrontend->seePost($_GET['postId']);
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }

        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $controllerFrontend = new ControllerFrontend();
                    $controllerFrontend->addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }

        } elseif ($_GET['action'] == 'reportComment') {
            if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                    $controllerFrontend = new ControllerFrontend();
                    $controllerFrontend->reportComment($_GET['commentId'], $_GET['postId']);
            } else {
                throw new Exception('Aucun identifiant de chapitre ou de commentaire envoyé');
            }

        } elseif ($_GET['action'] == 'seeAuthor') {
            $controllerFrontend = new ControllerFrontend();
            $controllerFrontend->seeAuthor();

        } elseif ($_GET['action'] == 'seeSignIn') {
            $controllerFrontend = new ControllerFrontend();
            $controllerFrontend->seeSignIn();

        } elseif ($_GET['action'] == 'signIn') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $controllerFrontend = new ControllerFrontend();
                $controllerFrontend->signIn($_POST['username'], $_POST['password']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }

        /* Debugging *********************************

        } elseif ($_GET['action'] == 'addUser') {
            if (!empty($_POST['username']) && !empty($_POST['password'])) {
                $controllerFrontend = new ControllerFrontend();
                $controllerFrontend->addUser($_POST['username'], $_POST['password']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }

        **********************************************/
     
    /* Back End Router */

        } elseif ($_GET['action'] == 'seeDashboard') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                $controllerBackend = new ControllerBackend();
                $controllerBackend->seeDashboard($_SESSION['username'], $_SESSION['password']);
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'seeAddPost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                $controllerBackend = new ControllerBackend();
                $controllerBackend->seeAddPost($_SESSION['username'], $_SESSION['password']);
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'addPost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $controllerBackend = new ControllerBackend();
                    $controllerBackend->addPost($_SESSION['username'], $_SESSION['password'], $_POST['title'], $_POST['content']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }  

        } elseif ($_GET['action'] == 'seeEditPosts') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                $controllerBackend = new ControllerBackend();
                $controllerBackend->seeEditPosts($_SESSION['username'], $_SESSION['password']);
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'seeEditPost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    $controllerBackend = new ControllerBackend();
                    $controllerBackend->seeEditPost($_SESSION['username'], $_SESSION['password'], $_GET['postId']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }
        
        } elseif ($_GET['action'] == 'editPost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        $controllerBackend = new ControllerBackend();
                        $controllerBackend->editPost($_SESSION['username'], $_SESSION['password'], $_GET['postId'], $_POST['title'], $_POST['content']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant de chapitre ou de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'seeRemovePost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    $controllerBackend = new ControllerBackend();
                    $controllerBackend->seeRemovePost($_SESSION['username'], $_SESSION['password'], $_GET['postId']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'removePost') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                    $controllerBackend = new ControllerBackend();
                    $controllerBackend->removePost($_SESSION['username'], $_SESSION['password'], $_GET['postId']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'editComment') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {            
                if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        $controllerBackend = new ControllerBackend();
                        $controllerBackend->editComment($_SESSION['username'], $_SESSION['password'], $_GET['postId'], $_POST['author'], $_POST['comment'], $_GET['commentId']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                } else {
                    throw new Exception('Aucun identifiant de chapitre ou de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'removeComment') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (isset($_GET['commentId']) && $_GET['commentId'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0) {
                    $controllerBackend = new ControllerBackend();
                    $controllerBackend->removeComment($_SESSION['username'], $_SESSION['password'], $_GET['commentId'], $_GET['postId']);
                } else {
                    throw new Exception('Aucun identifiant de chapitre ou de commentaire envoyé');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'seeSettings') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                $controllerBackend = new ControllerBackend();
                $controllerBackend->seeSettings($_SESSION['username'], $_SESSION['password']);
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'editUsername') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (!empty($_POST['newUsernameOne']) && !empty($_POST['newUsernameTwo'])) {
                    if ($_POST['newUsernameOne'] == $_POST['newUsernameTwo']) {
                        $controllerBackend = new ControllerBackend();
                        $controllerBackend->editUsername($_SESSION['username'], $_SESSION['password'], $_POST['newUsernameOne']);
                    } else {
                        throw new Exception('L\'identifiant doit être écrit deux fois à l\'identique');
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }
        
        } elseif ($_GET['action'] == 'editPassword') {
            if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                if (!empty($_POST['newPasswordOne']) && !empty($_POST['newPasswordTwo'])) {
                    if ($_POST['newPasswordOne'] == $_POST['newPasswordTwo']) {
                        $controllerBackend = new ControllerBackend();
                        $controllerBackend->editPassword($_SESSION['username'], $_SESSION['password'], $_POST['newPasswordOne']);
                    } else {
                        throw new Exception('Le mot de passe doit être écrit deux fois à l\'identique');
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucune connexion en tant qu\'administrateur');
            }

        } elseif ($_GET['action'] == 'signOut') {
            $controllerBackend = new ControllerBackend();
            $controllerBackend->signOut();

        } else {
            throw new Exception('Aucune action définie');
        }

    } else {
        $controllerFrontend = new ControllerFrontend();
        $controllerFrontend->seeHome();
    }
    
} catch(Exception $e) {
    $errorMessage = $e->getMessage();
    require('views/viewError.php');
}