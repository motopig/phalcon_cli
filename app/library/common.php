<?php

/**
 * 定义常量
 * @param $argv
 */
function define_con($argv)
{
    define('VERSION', '1.1.0');
    define('LOGS_PATH',APPLICATION_PATH.'/logs');
    define('CURRENT_TASK', (isset($argv[1]) ? $argv[1] : null));
    define('CURRENT_ACTION', (isset($argv[2]) ? $argv[2] : null));
}

/**
 * 获取配置信息
 * @param $name
 * @return mixed
 * @throws \Phalcon\CLI\Console\Exception
 */
function get_config($name)
{

    $config_file = APPLICATION_PATH.'/config/'.$name.'.php';
    if(!file_exists($config_file) || !is_readable($config_file)){
        exception('配置文件"'.$config_file.'不存在或者不可读"');
    }
    $config = require $config_file;

    return $config;
}

/**
 * 分配参数
 * @param $argv
 * @return array
 */
function get_arguments($argv)
{
    $arguments = array();
    foreach($argv as $k => $arg) {
        if($k == 1) {
            $arguments['task'] = $arg;
        } elseif($k == 2) {
            $arguments['action'] = $arg;
        } elseif($k >= 3) {
            $arguments['params'][] = $arg;
        }
    }
    return $arguments;
}

/**
 * 抛出异常
 * @param $msg
 * @throws \Phalcon\CLI\Console\Exception
 */
function exception($msg)
{
    throw new Phalcon\CLI\Console\Exception($msg);
}
