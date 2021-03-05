<?php

namespace NullObject;

class UserRepository
{
    private $db;

    public function __construct(IDatabaseAdapter $db)
    {
        $this->db = $db;
    }

    public function fetchById($id)
    {
        $sql = "SELECT * FROM users WHERE id=" . $id;
        $row = $this->db->query($sql);
        if (!isset($row)) {
            return new NullUser();
        }

        return $this->createUser($row);
    }

    private function createUser($row)
    {
        $user = new User($row['id'], $row['login'], $row['email']);

        return $user;
    }
}
