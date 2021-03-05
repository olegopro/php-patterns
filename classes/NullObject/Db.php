<?php

namespace NullObject;

class Db implements IDatabaseAdapter
{

    private $mysqli;
    private $host;
    private $user;
    private $password;
    private $db;

    public function __construct($host, $user, $password, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->mysqli = NULL;

        $this->connect();
    }

    public function connect()
    {
        $this->mysqli = new \mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_errno . ') '
                . $this->mysqli->connect_error);
        }
    }

    public function getDb()
    {
        return $this->mysqli;
    }

    public function query($query)
    {
        $result = $this->mysqli->query($query);
        if ($result) {
            return $result->fetch_assoc();
        }
    }

}
