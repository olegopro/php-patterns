<?php

namespace Multiton;

class FileSave
{
    private $fileName;
    private static $_instance = [];

    private function __construct($str)
    {
        $this->fileName = $str . '-' . md5(microtime()) . '.txt';
    }

    public static function getInstance($str): FileSave
    {
        //instanceof
        if (!isset(self::$_instance[$str])) {
            self::$_instance[$str] = new static($str);
        }

        return self::$_instance[$str];
    }

    public function save($dir)
    {
        $content = " text";
        if (file_exists($dir . '/' . $this->fileName)) {
            $content = file_get_contents($dir . '/' . $this->fileName) . $content;
        }

        file_put_contents($dir . '/' . $this->fileName, $content);
    }

    public static function removeInstance($instanceName)
    {
        if (array_key_exists($instanceName, static::$_instance)) {
            unset(static::$_instance[$instanceName]);
        }
    }

    private function __clone() { }

    private function _wakeup() { }

}