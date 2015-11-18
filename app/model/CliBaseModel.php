<?php

namespace App\Model;
use \Phalcon\Mvc\Model;

class CliBaseModel extends Model
{
    protected $table_name = '';
    protected $config = '';
    public function initialize()
    {
        $this->config = $this->getDI()->get('config');
        $db_prefix = $this->config['mysql']['prefix'];
        $this->setSource($db_prefix.$this->table_name);
    }
}