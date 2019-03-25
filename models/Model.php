<?php
namespace Forteroche\Models;

/**
 * Connexion à la base de données
 */
abstract class Model
{
    protected static function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=db_forteroche;charset=utf8', 'root', '');

        return $db;
    }
}