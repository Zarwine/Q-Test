<?php

use App\Repository\DatabaseSQLite;

class CreateContactTable extends DatabaseSQLite
{    
    public function createTable()
    {
        $this->pdo->query("CREATE TABLE IF NOT EXISTS messages ( 
            id            INTEGER         PRIMARY KEY AUTOINCREMENT,
            name          VARCHAR( 250 ),
            email         VARCHAR( 250 ),
            message       VARCHAR( 250 ),
            viewed        TINYINT( 1 ),
            ip            VARCHAR( 15 ),
            created_at    DATETIME CURRENT_TIMESTAMP
        );");
    }
}
