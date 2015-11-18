<?php
namespace App\Model;

use App\Task\BaseTask;
use Library\Error;

class UserModel extends CliBaseModel
{

    const  STATUS = 1; //用户状态

    public function initialize()
    {
        $this->table_name = 'User';
        $this->hasMany(
            'id',
            'App\Model\UserOrderModel',//用户订单表
            'u_id',
            array(
                'alias' => 'user_order'
            )
        );
        $this->hasOne(
            'id',
            'App\Model\UserExtModel',//用户扩展信息
            'u_id',
            array(
                'alias' => 'user_ext'
            )
        );
        parent::initialize();
    }

    public function getUserInfo($u_id)
    {
        $userInfo = self::findFirst($u_id);
        if(!$userInfo){
            exception('用户不存在');
        }
        return $userInfo;
    }

}
