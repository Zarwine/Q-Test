<?php

namespace App\Repository;

use PDO;
use App\Repository\Contact;

class ContactRepository extends DatabaseSQLite
{
    public function findAll()
    {
        $pdo = $this->pdo;
        $query = "SELECT * FROM messages ORDER BY id";
        $req = $pdo->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $message = new Contact();
            $message->setId($row['id']);
            $message->setName($row['name']);
            $message->setEmail($row['email']);
            $message->setMessage($row['message']);
            $message->setViewed($row['viewed']);
            $message->setIp($row['ip']);
            $messages[] = $message;
        };
        return $messages;
    }

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

    public function find($id)
    {
        $pdo = $this->pdo;
        $query = "SELECT * FROM messages WHERE id = :id";
        $req = $pdo->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $row = $req->fetch(PDO::FETCH_ASSOC);
        $message = new Contact();
        $message->setId($row['id']);
        $message->setName($row['name']);
        $message->setEmail($row['email']);
        $message->setMessage($row['message']);
        $message->setViewed($row['viewed']);
        $message->setIp($row['ip']);
        $message->setCreatedAt($row['created_at']);

        return $message;
    }

    public function updateViewed($message)
    {
        $pdo = $this->pdo;
        $query = "UPDATE messages SET 'viewed' = :viewed WHERE id = :id";
        $req = $pdo->prepare($query);
        $req->bindValue(':viewed', $message->viewed, PDO::PARAM_INT);
        $req->bindValue(':id', $message->id, PDO::PARAM_INT);
        $req->execute();
    }
}