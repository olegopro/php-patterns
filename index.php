<?php

//use Singleton\FileSave;
use Multiton\FileSave;
use StaticFabric\StaticFactory;

require "functions.php";
spl_autoload_register('project_autoload');

/*
//SINGLETON

$file = FileSave::getInstance('user-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('system-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('user-logs');
$file->save(__DIR__);

$file = FileSave::getInstance('system-logs');
$file->save(__DIR__);
*/

/*
//STATIC FABRIC

$obj = StaticFactory::create('\StaticFabric\FactoryClass');
$obj->save();
*/
