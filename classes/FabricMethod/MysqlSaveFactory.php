<?php

namespace FabricMethod;

class MysqlSaveFactory implements ISaveFactory
{
    private $host, $user, $pass, $db;

    public function __construct($host, $user, $pass, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function createSaver(): ISave
    {
        return new MysqlSave($this->host, $this->user, $this->pass, $this->db);
    }

}
