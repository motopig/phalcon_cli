<?php

namespace Library;

use \Predis\Client;


class Redis extends Client{

    public function incr_expire($key,$expire=3600)
    {
        $res = $this->incr($key);
        $this->expire($key,(int)$expire);
        return $res;
    }

}