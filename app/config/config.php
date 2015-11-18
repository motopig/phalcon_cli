<?php
return array(
    //是否开发模式
    'debug' => 1,
    'queue_apply_num' => 100,//队列类task默认的处理该数量的队列数量后退出
    'queue_apply_spacing_time' => 100,//队列两条数据处理中间间隔,单位毫秒
    'loop_apply_num' => 100,//循环类task默认循环该数量后退出
    'fail_max_queue_apply_num' => 3,//队列数据处理失败后最大处理次数
    'fail_wait_time' => 3,//队列数据处理失败后等待该秒数后重试
    
    //MYSQL数据库配置
    'mysql' => array(
        'prefix' => 'fi_',
        "host" => "127.0.0.1",
        "username" => "root",
        "password" => "root",
        "dbname" => "cli",
        "port" => 3306,
        "charset" => 'utf8',
    ),
    //缓存配置
    'cache'=>array(
        'adapter'=>'memcache',//当前缓存系统
        'lifetime' => 86400,//默认缓存时间
        //memcached配置
        'memcached' => array(
            'prefix'=>'cache_prefix_',
            'persistent'=>false,
            'servers' => array(
                array(
                    'host' => '127.0.0.1',
                    'port' => 11211,
                    'weight' => 1
                ),
                array(
                    'host' => '127.0.0.1',
                    'port' => 11212,
                    'weight' => 1
                ),
            ),
        ),
        //memcache配置
        'memcache' => array(
            'host'=>'127.0.0.1',
            'port'=>11211,
            'prefix'=>'cache_prefix_',
            'persistent'=>false,
        ),
        //文件缓存配置
        'file' => array(
            'prefix'=>'cache_prefix_',
            'cacheDir'=>APPLICATION_PATH.'/tmp/cache',
        ),
    ),
    //Beanstalk队列配置
    'beanstalk' => array(
        'host' => '127.0.0.1',
        'port' => 11300,//端口
        'connectTimeout' => 2,//连接超时时间
        'priority' => 1024,//优先级 
        'delay' => 0,//默认延迟时间
        'ttr' => 60,//默认处理时间
    ),
    //redis
    'redis' => array(
        'servers' => array(
            array(
                'host'     => '127.0.0.1',
                'port'     => 6379,
                'database' => 11,
                'password' => 'root',
                'alias'    => 'first',
            )
        ),
        'options' => array(
            'prefix' => 'sylar_cli_:'
        ),
    ),
);