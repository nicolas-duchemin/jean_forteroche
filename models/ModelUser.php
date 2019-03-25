<?php
namespace Forteroche\Models;

require_once("models/Model.php");

/**
 * Manipulation des données concernant les membres
 */
class ModelUser extends Model
{
    private $_db;

    public function __construct()
    {
        $this->_db = parent::dbConnect();
    }

    // GETTERS

    // Récupération du mot de passe d'un membre
    public function getUser($username)
    {
        $userData = $this->_db->prepare('SELECT password_hash FROM users WHERE username = ?');
        $userData->execute(array($username));

        $user = $userData->fetch();
        return $user;
    }

    // SETTERS

    // Modification de l'identifiant ou du mot de passe d'un membre
    public function editUser($newUsername, $newPassword)
    {
        $query = $this->_db->prepare('UPDATE users SET username = :newUsername, password_hash = :newPassword_hash WHERE username = :pastUsername');

        $executedQuery = $query->execute(array(
            'newUsername' => $newUsername,
            'newPassword_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
            'pastUsername' => $_SESSION['username']
        ));

        return $executedQuery;
    }

    /* Debugging *********************************

    // Ajout d'un membre
    public function setUser($username, $password)
    {
        $query = $this->_db->prepare('INSERT INTO users(username, password_hash) VALUES(:username, :password_hash)');

        $executedQuery = $query->execute(array(
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT)
        ));

        return $executedQuery;
    }

    **********************************************/
}