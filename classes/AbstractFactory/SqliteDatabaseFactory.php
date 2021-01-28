<?php

namespace AbstractFactory;

class SqliteDatabaseFactory implements DatabaseFactory
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function connect(): DatabaseConnect
    {
        return new SqliteDatabaseConnect($this->filename);
    }

    public function query(): DatabaseQuery
    {
        return new SqliteDatabaseQuery($this->connect());
    }
}
