<?php

//use Singleton\FileSave;
use Multiton\FileSave;

require "functions.php";
spl_autoload_register('project_autoload');

$file = FileSave::getInstance('user-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('system-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('user-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('system-logs');
$file->save(__DIR__);