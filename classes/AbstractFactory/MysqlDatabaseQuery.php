<?php

namespace AbstractFactory;

class MysqlDatabaseQuery implements DatabaseQuery
{
    private object $connector;

    public function __construct(DatabaseConnect $connector)
    {
        $this->connector = $connector;
    }

    public function execute(string $query)
    {
        $this->connector->connection()->query($query);
    }
}
