<?php

namespace FabricMethod;

class MysqlSave implements ISave
{
    public function __construct($host, $user, $pass, $db)
    {
        $this->mysqli = new \mysqli($host, $user, $pass, $db);
        if ($this->mysqli->connect_error) {
            die('Ошибка подключения (' . $this->mysqli->connect_errno . ')'
                . $this->mysqli->connect_error);
        }
    }

    public function save($message)
    {
        $result = $this->mysqli->query("INSERT INTO `messages`(`text`) VALUES ('" . $message . "')");
    }
}
