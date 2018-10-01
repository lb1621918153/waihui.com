<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 10:34
 */

namespace Common\Model;

use Think\Model;

class UserModel extends Model
{
    protected $_validate = array(
        array('phone', 'require', '手机号是必需的', 0, 'unique', 1),
        array('password', 'require', '密码是必需的'),
        array('status', array(-1, 0, 1, 2), '状态值错误', 0, 'in')
    );

    protected $_auto = array(
        array('head_img', '/admin/img/user-medium.png'),
        array('password', 'md5', 3, 'function'),
        array('money', 0.0),
        array('margin', 0.0),
        array('status', 0),
        array('create_time', 'time', 1, 'function'),
        array('update_time', 'time', 3, 'function')
    );
}