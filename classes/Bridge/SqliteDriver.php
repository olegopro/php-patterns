<?php

namespace Bridge;

class SqliteDriver implements IDriver
{
    private $sqlite;

    public function __construct($filepath)
    {
        $this->sqlite = new \SQLite3($filepath);
        //$this->sqlite->query("CREATE TABLE messages(id, text);");
    }

    public function execute($string)
    {
        $this->sqlite->query($string);
    }
}
