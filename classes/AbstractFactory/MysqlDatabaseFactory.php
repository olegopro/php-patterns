<?php

namespace AbstractFactory;

class MysqlDatabaseFactory implements DatabaseFactory
{
    private string $host, $user, $pass, $db;

    public function __construct(string $host, string $user, string $pass, string $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
    }

    public function connect(): DatabaseConnect
    {
        return new MysqlDatabaseConnect($this->host, $this->user, $this->pass, $this->db);
    }

    public function query(): DatabaseQuery
    {
        return new MysqlDatabaseQuery($this->connect());
    }
}
