<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelUser extends Model
{
    public function getUser($username)
    {
        $db = $this->dbConnect();
        $userData = $db->prepare('SELECT password_hash FROM users WHERE username = ?');
        $userData->execute(array($username));

        $user = $userData->fetch();
        return $user;
    }

    public function editUser($newUsername, $newPassword)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('UPDATE users SET username = :newUsername, password_hash = :newPassword_hash WHERE username = :pastUsername');

        $executedQuery = $query->execute(array(
            'newUsername' => $newUsername,
            'newPassword_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
            'pastUsername' => $_SESSION['username']
        ));

        return $executedQuery;
    }

    /* Debugging *********************************
    public function setUser($username, $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO users(username, password_hash) VALUES(:username, :password_hash)');

        $executedQuery = $query->execute(array(
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT)
        ));

        return $executedQuery;
    }*/
}