<?php
namespace Facade;

class Log 
{
    private $filePath;

    public function __construct($filePath) 
    {
        $this->filepath = $filePath;
    }

    public function addLog($message) 
    {
        file_put_contents($this->filepath, $message.PHP_EOL, FILE_APPEND);
    }
}