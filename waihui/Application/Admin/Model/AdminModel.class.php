<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/9
 * Time: 21:40
 */

namespace Admin\Model;

use Think\Model;

/**
 * 管理员模型类
 *
 * Class AdminModel
 * @package Admin\Model
 */
class AdminModel extends Model
{
    /* 自动验证 */
    protected $_validate = array(
        array('account', 'require', '管理员账号不能为空！'),
        array('account', '', '账号已经存在！', 0, 'unique')
    );

    /* 新增时自动填充power字段 */
    protected $_auto = array(
        array('power', '1')
    );
}