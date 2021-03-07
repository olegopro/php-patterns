<?php

namespace Bridge;

class SafeSave extends Save
{
    protected $data, $crypt;

    public function __construct(IDriver $driver, $data, $crypt)
    {
        parent::__construct($driver);
        $this->data = $data;
        $this->crypt = $crypt;
    }

    public function save()
    {
        $data = $this->data;

        if ($this->crypt == 'md5') {
            $data = md5($data);
        }

        $query = "INSERT INTO `messages`(`text`) VALUES ('" . $data . "')";
        $this->driver->execute($query);
    }
}
