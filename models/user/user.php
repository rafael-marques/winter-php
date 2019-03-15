<?php

namespace Model;

use \System\Model;
use PDO;

class User extends Model
{
    public function getUsers()
    {
        $query = $this->Conn->query("SELECT * FROM " . DB_USER);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserCount()
    {
        return $this->total(DB_USER);
    }

    public function getUser($user_id)
    {
        $query = $this->Conn->query("SELECT * FROM " . DB_USER . " WHERE user_id = {$user_id}");
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
