<?php

namespace FabricMethod;

class FileSaveFactory implements ISaveFactory
{

    private $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function createSaver(): ISave
    {
        return new FileSave($this->filepath);
    }
}
