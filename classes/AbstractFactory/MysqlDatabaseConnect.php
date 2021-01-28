<?php

namespace AbstractFactory;

class MysqlDatabaseConnect implements DatabaseConnect
{
    private $mysqli;

    public function __construct($host, $user, $pass, $db)
    {
        $this->mysqli = new \mysqli($host, $user, $pass, $db);
        if ($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_errno . ')'
                . $this->mysqli->connect_error);
        }
    }

    public function connection()
    {
        return $this->mysqli;
    }
}
