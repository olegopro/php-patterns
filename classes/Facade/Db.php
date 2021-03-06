<?php

namespace Facade;

use mysqli;

class Db
{
    private $mysqli;
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->mysqli = NULL;
    }

    public function connect()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->connect_error) {
            die('Ошибка подключения' . $this->mysqli->connect_errno);
        }
    }

    public function saveDocument($message)
    {
        $this->mysqli->query("INSERT INTO `messages` (text) VALUES('" . $message . "')");
    }

}
