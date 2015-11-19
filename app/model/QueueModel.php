<?php


namespace App\Model;


class QueueModel extends CliBaseModel
{
    public function initialize()
    {
        $this->table_name = 'queue';
        parent::initialize();
    }

    /*
     * 根据key获取队列数据
     * @param $key
     * @return
     */
    public function getQueueByKey($key)
    {

    }
}