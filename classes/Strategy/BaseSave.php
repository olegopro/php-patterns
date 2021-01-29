<?php

namespace Strategy;

abstract class BaseSave implements IFileSave
{
    protected string $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function save()
    {

    }
}
