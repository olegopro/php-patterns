<?php

//use Singleton\FileSave;
//use Multiton\FileSave;

use StaticFabric\StaticFactory;

use FabricMethod\FileSaveFactory;
use FabricMethod\MysqlSaveFactory;

use AbstractFactory\MysqlDatabaseFactory;
use AbstractFactory\SqliteDatabaseFactory;
use AbstractFactory\DatabaseFactory;

use Builder\MysqlQueryBuilder;
use Builder\SQLQueryBuilder;

use Prototype\User;
use Prototype\Post;

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

/*
//FABRIC METHOD

$factory = new FileSaveFactory('testFile.txt');
$factory = new MysqlSaveFactory('192.168.44.25', 'root', '2704509Ee', 'patterns');

var_dump($factory);

$date = date('H:i:s');
$factory->createSaver()->save("hello world $date");
*/

/*
//ABSTRACT FACTORY

function queryExecute(DatabaseFactory $factory)
{
    $obj = $factory->query();
    $obj->execute("INSERT INTO `message`(`text`) VALUES ('test')");
}

queryExecute(new MysqlDatabaseFactory('localhost', 'root', '', 'patterns'));
queryExecute(new SqliteDatabaseFactory('test.db'));
*/

/*
//BUILDER

function queryExecute(SQLQueryBuilder $builder)
{
    $query = $builder->select(['id', 'text'])
                     ->from('messages')
                     ->where('id', 1)
                     ->getQuery();
    echo $query;
}

queryExecute(new MysqlQueryBuilder());
*/

//Prototype

$user = new User('User');
$post = new Post($user, 'First Post', 'Hello world');
$post->addComment('Hello');

$post2 = clone $post;

var_dump($post, $post2);
