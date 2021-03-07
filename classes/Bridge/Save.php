<?php

namespace Bridge;

abstract class Save
{
    protected $driver;

    public function __construct(IDriver $driver)
    {
        $this->driver = $driver;
    }

    public function changeDriver(IDriver $driver)
    {
        $this->driver = $driver;
    }

    abstract public function save();

}
