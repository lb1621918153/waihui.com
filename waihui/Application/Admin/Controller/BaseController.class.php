<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/10
 * Time: 18:47
 */

namespace Admin\Controller;

use Think\Controller;

/**
 * 确保每个操作都是登陆后执行
 *
 * Class BaseController
 * @package Admin\Controller
 */
class BaseController extends Controller
{
    public function _initialize()
    {
        if (!session("admin"))
        {
            redirect("/admin/login");
        }
    }
}
