<?php

namespace App\Repository;

use PDO;
use Exception;

class DatabaseSQLite
{
    protected $pdo;

    /**
     * Initialise la base de donné de développement ou de test
     * @param string $type
     *      Définis par "DEVDB" ou "TESTDB" que l'on peut trouver dans le fichier config/database.php
     *      la base de donnée à créer
     * 
     */
    public function __construct($type)
    {
        try {
            $this->pdo = new PDO($type);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
        } catch (Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : " . $e->getMessage();
            die();
        }
    }
}
