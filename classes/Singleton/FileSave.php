<?php

namespace Singleton;

class FileSave
{
    private $fileName;
    private static $_instance = NULL;

    private function __construct()
    {
        $this->fileName = md5(microtime()) . '.txt';
    }

    public static function getInstance(): FileSave
    {
        //instanceof
        if (NULL === self::$_instance) {
            self::$_instance = new static();
        }

        return self::$_instance;
    }

    public function save($dir)
    {
        $content = " text";
        if (file_exists($dir . '/' . $this->fileName)) {
            $content = file_get_contents($dir . '/' . $this->fileName) . $content;
        }

        file_put_contents($dir . '/' . $this->fileName, $content);
    }

    private function __clone() { }

    private function _wakeup() { }

}