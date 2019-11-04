<?php
namespace Framework\Database;


use PDO;
use PDOException;

/**
 * Class Connection
 * @package Project\Database
 */
class Connection
{

    /**
     * Make connection to database via PDO
     * @return PDO
     */
    public static function make(array $config)
    {
       // Connection to Database
       try {

           return new PDO(
               sprintf('%s;dbname=%s', $config['connection'], $config['name']),
               $config['username'],
               $config['password'],
               $config['options']
           );

       } catch (PDOException $e) {

           die($e->getMessage());
       }
    }
}

/* $pdo = Connection::make(); */