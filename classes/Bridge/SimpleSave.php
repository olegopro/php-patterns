<?php

namespace Bridge;

class SimpleSave extends Save
{
    protected $data;

    public function __construct(IDriver $driver, $data)
    {
        parent::__construct($driver);
        $this->data = $data;
    }

    public function save()
    {
        $query = "INSERT INTO `messages`(`text`) VALUES('" . $this->data . "')";
        $this->driver->execute($query);
    }
}
