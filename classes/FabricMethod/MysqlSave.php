<?php

namespace FabricMethod;

use JetBrains\PhpStorm\Language;

class MysqlSave implements ISave
{
    private object $mysqli;

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
        $this->mysqli->query("INSERT INTO `messages`(`text`) VALUES ('" . $message . "')");
    }
}
