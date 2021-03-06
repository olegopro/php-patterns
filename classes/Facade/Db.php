<?php
namespace Facade;

class Db {

    private $mysqli;
    private $host;
    private $user;
    private $pass;
    private $db;

    public function __construct($host, $user, $pass , $db) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->mysqli = null;
    }

    public function connect() {
        $this->mysqli = new \mysqli($this->host, $this->user, $this->pass,  $this->db);

        if ($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_errno . ') '
                    . $this->mysqli->connect_error);
        }
    }

    public function saveDocument($message) 
    {
        $this->mysqli->query("INSERT INTO `messages` (text) VALUES ('".$message."')");
    }

}