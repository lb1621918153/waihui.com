<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/10
 * Time: 21:05
 */

namespace Admin\Controller;

use Think\Controller;
/**
 * 登陆模块
 *
 * Class LoginController
 * @package Admin\Controller
 */
class LoginController extends Controller
{
    /**
     * 登陆页面
     */
    public function index() {
        if (session("admin")) {
            redirect("/admin");
            return;
        }
        $this->display();
    }

    /**
     * 登陆操作
     */
    public function login() {
        if (session("admin")) {
            redirect("/admin");
            return;
        }
        $adminModel = D("Admin");
        $admin = $adminModel->where(array("account" => I("account")))->find();
        if ($admin) {
            if ($admin['password'] == I("password")) {
                $admin['login_time'] = time();
                $adminModel->save($admin);
                session("admin", $admin);
                redirect("/admin");
            } else {
                $this->error("密码错误！");
            }
        } else {
            $this->error("账号不存在！");
        }
    }

    /**
     * 注销操作
     */
    public function logout() {
        session('admin', null);
        redirect("/Admin/Login");
    }
}