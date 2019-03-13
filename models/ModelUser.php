<?php
namespace NWC\Forteroche\Models;

require_once("models/Model.php");

class ModelUser extends Model
{
    public function setUser($username, $password)
    {
        $db = $this->dbConnect();
        $query = $db->prepare('INSERT INTO users(username, password_hash) VALUES(:username, :password_hash)');

        $executedQuery = $query->execute(array(
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT)
        ));

        return $executedQuery;
    }

    public function getUser($username)
    {
        $db = $this->dbConnect();
        $userData = $db->prepare('SELECT password_hash FROM users WHERE username = ?');
        $userData->execute(array($username));

        $user = $userData->fetch();
        return $user;
    }

}