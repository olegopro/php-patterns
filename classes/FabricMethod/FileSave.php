<?php

namespace FabricMethod;

class FileSave implements ISave
{
    private $filepath;

    public function __construct($filepath)
    {
        $this->filepath = $filepath;
    }

    public function save($message)
    {
        file_put_contents($this->filepath, $message);
    }

}
