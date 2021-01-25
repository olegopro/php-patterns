<?php

use Singleton\FileSave;

require "functions.php";
spl_autoload_register('project_autoload');

$file = FileSave::getInstance();
$file->save(__DIR__);

$file = FileSave::getInstance();
$file->save(__DIR__);

$file = FileSave::getInstance();
$file->save(__DIR__);

$file = FileSave::getInstance();
$file->save(__DIR__);