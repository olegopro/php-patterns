<?php

namespace AbstractFactory;

class SqliteDatabaseConnect implements DatabaseConnect
{
    private $sqlite;

    public function __construct($filename)
    {
        $this->sqlite = new \SQLite3($filename);
    }

    public function connection()
    {
        return $this->sqlite;
    }
}
