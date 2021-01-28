<?php

namespace AbstractFactory;

class SqliteDatabaseQuery implements DatabaseQuery
{
    private $connector;

    public function __construct(DatabaseConnect $connector)
    {
        $this->connector = $connector;
    }

    public function execute(string $query)
    {
        $this->connector->connection()->query("CREATE TABLE message(id, text);");
        $this->connector->connection()->query($query);
    }
}
