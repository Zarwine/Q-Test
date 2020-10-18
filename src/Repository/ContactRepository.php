<?php

namespace App\Repository;
use PDO;

class ContactRepository extends DatabaseSQLite
{
    public function create($username, $email, $message, $ip)
    {
        $pdo = $this->pdo;
        $query = "INSERT INTO messages (id, name, email, message, viewed, ip, created_at)
        VALUES (NULL, :name, :email, :message, 0, :ip, CURRENT_TIMESTAMP);";
        $req = $pdo->prepare($query);
        $req->bindValue(':name', $username, PDO::PARAM_STR);
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':message', $message, PDO::PARAM_STR);
        $req->bindValue(':ip', $ip, PDO::PARAM_STR);
        $req->execute();
    }
}