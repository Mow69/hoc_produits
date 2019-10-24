<?php

namespace App;

class Db
{
    // Attribut statique : sera partagé par toutes les instances de cette classe
    // Accessible via l'opérateur :: sans instancier la classe
    private static $instance = null;

    // Constructeur privé :
    // Impossible de l'instancier de l'extérieur
    // Mais il est possible qu'elle s'instancie elle-même
    private function __construct()
    { }

    public static function getInstance(): ?\PDO
    {
        try {
            if (is_null(self::$instance)) {
                $dbConfig = new Config(__DIR__ . '/../config/db.ini');

                $dsn = 'mysql:host=' . $dbConfig->host .
                    ';dbname=' . $dbConfig->dbname .
                    ';charset=' . $dbConfig->charset;
                    
                self::$instance = new \PDO($dsn, $dbConfig->user, $dbConfig->password);
            }

            return self::$instance;
        } catch (\Exception $ex) {
            throw $ex;
        }
    }
}
