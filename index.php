<?php

//use Singleton\FileSave;
//use Multiton\FileSave;

//use StaticFabric\StaticFactory;

//use FabricMethod\FileSaveFactory;
//use FabricMethod\MysqlSaveFactory;

//use AbstractFactory\MysqlDatabaseFactory;
//use AbstractFactory\SqliteDatabaseFactory;
//use AbstractFactory\DatabaseFactory;

//use Builder\MysqlQueryBuilder;
//use Builder\SQLQueryBuilder;

//use Prototype\User;
//use Prototype\Post;

//use Observer\Blog;
//use Observer\SendMailPlugin;
//use Observer\ChangeTextPlugin;

//use Strategy\DocumentSave;
//use Strategy\ImagesSave;
//use Strategy\BaseLogic;

//use Iterator\Blog;
//use Iterator\Post;

//use TemplateMethod\Page;
//use TemplateMethod\HomePage;
//use TemplateMethod\AboutPage;

//use NullObject\Db;
//use NullObject\User;
//use NullObject\UserRepository;

//use Mediator\Router;
//use Mediator\Data;
//use Mediator\App;
//use Mediator\Page;
//use Mediator\PageHelper;

//use Facade\Db;
//use Facade\Log;
//use Facade\Mail;
//use Facade\Document;

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
$factory = new MysqlSaveFactory('localhost', 'root', '', 'patterns');

var_dump($factory);

$date = date('H:i:s');
$factory->createSaver()->save("hello world $date");
*/

//ABSTRACT FACTORY

/*
function queryExecute(DatabaseFactory $factory)
{
    $obj = $factory->query();
    $obj->execute("INSERT INTO `message`(`text`) VALUES ('test')");
}

queryExecute(new MysqlDatabaseFactory('localhost', 'root', '', 'patterns'));
queryExecute(new SqliteDatabaseFactory('test.db'));
*/

//BUILDER

/*
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

/*
//Prototype

$user = new User('User');
$post = new Post($user, 'First Post', 'Hello world');
$post->addComment('Hello');

$post2 = clone $post;

var_dump($post, $post2);
*/

/*
//OBSERVER

$blog = new Blog();
$blog->title = ' Hello world';
$blog->text = ' Some text';

$blog->attach(new SendMailPlugin(), 'all');
$blog->attach(new ChangeTextPlugin(), 'blog:create');
$blog->attach(new ChangeTitlePlugin(), 'blog:update');

$blog->update();

echo $blog->title . '<br>';
echo $blog->text . '<br>';
*/

/*
//STRATEGY

//$obj = new BaseLogic(new DocumentSave('patterns.docx'));
//$obj = new BaseLogic(new ImagesSave('strategy.png'));
//$obj->execute();

function saveStrategy($strategyCollection)
{
    foreach ($strategyCollection as $item) {
        if ($item instanceof \Strategy\IFileSave) {
            $item->save();
        }
    }

    return TRUE;
}

saveStrategy([
    new ImagesSave('strategy.png'),
    new DocumentSave('      patterns.docx')
]);
*/

//ITERATOR

/*
$blog = new Blog();

$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));
$blog->addPost(new Post('title', 'text', 'author'));

foreach ($blog as $post) {
    var_dump($post);
}
*/

//TEMPLATE METHOD

/*
$home = new HomePage();
$home->output();
*/

//NULL OBJECT

/*
$db = new Db('localhost', 'root', '', 'patterns');
$userRepository = new UserRepository($db);
$user = $userRepository->fetchById(2);

//var_dump($user);

echo $user->getLogin();
*/

//MEDIATOR

/*
$router = new Router();
new PageHelper(new Data(), $router, new Page());
$router->request();

*/

//COMMAND

/*
$chat = new \Command\ChatInterface();
$user = new \Command\User();

$chat->setCommand(new \Command\GoOnLine($user));

$chat->run();
$chat->undo();
*/

//FACADE

/*
$db = new Db('localhost', 'root', '', 'patterns');
$log = new Log('logFile.txt');
$mail = new Mail('admin@admin', 'subject', 'message', '');

$document = new Document($db, $log, $mail);
$document->save('new document');
*/

//ADAPTER

/*$form = new \Adapter\WebMoney(['key' => 'JKHBSD@#(#@QKLN']);
$form->getFormPay(100);*/

$adapter = new \Adapter\PaymentAdapter(new \Adapter\WebMoney(['key' => 'JKHBSD@#(#@QKLN']));
$adapter->pay(1000);
