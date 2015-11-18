#!/usr/bin/env php
<?php

use Phalcon\DI\FactoryDefault\CLI as CliDI,
    Phalcon\CLI\Console as ConsoleApp;

$di = new CliDI();

defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__)));

require dirname(dirname(__FILE__)).'/vendor/autoload.php';
require APPLICATION_PATH.'/library/common.php';

define_con($argv);
regster_autoload();

$config = get_config('config');
$di->set('config', $config);

//queue


//beanstalk
$di->set('beanstalk',function()use($config){
    $config = $config['beanstalk'];
    return new Pheanstalk\Pheanstalk($config['host'],$config['port'],$config['connectTimeout']);
});

//redis
$di->set('redis',function()use($config){
    $config = $config['redis'];
    return new  Predis\Client($config['servers']['host']));
});


$di->set('dispatcher', function () {
    $dispatcher = new Phalcon\CLI\Dispatcher();
    $dispatcher->setDefaultNamespace("App\Task");
    return $dispatcher;
});

$console = new ConsoleApp();
$console->setDI($di);

$arguments = get_arguments($argv);

$di->setShared('console', $console);

try {
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}
