<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 14:32
 */

namespace Admin\Controller;


use Think\Exception;

class AdminController extends BaseController
{
    public function index() {
        $admin = session('admin');
        if ($admin['power'] != 2) {
            $this->error('权限不足');
        } else {
            $admins = D("Admin")->where(array('power' => 1))->select();
            $this->assign('admins', $admins);
            $this->assign('empty', '<div class="text-center" style="font-size: 24px;">还没有普通管理员！</div>');
            $this->display();
        }
    }

    public function del() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res =  M('admin')->where(array('id' => $id))->delete();
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '操作成功';
            } else {
                $result['msg'] = '操作失败，请刷新页面重试';
            }
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 管理员的添加
     */
    public function add() {
        $admin = session('admin');
        if ($admin['power'] != 2) {
            $this->error('权限不足');
        } else {
            $account = I('account');
            $password = I('password');
            $result = array('code' => 1);
            if (!$account || !$password) {
                $result['msg'] = "账号密码不能为空";
            } elseif (strlen($password) < 6) {
                $result['msg'] = "密码长度不能小于6位";
            } else {
                $admin = D('Admin');
                $data = array(
                    'account' => $account,
                    'password' => $password
                );
                try {
                    $res = $admin->add($data);
                    if ($res) {
                        $result['code'] = 0;
                        $result['msg'] = "添加成功";
                    } else {
                        $result['msg'] = "添加失败";
                    }
                } catch (Exception $e) {
                    $result['msg'] = "账号已经存在";
                }
            }
            $this->ajaxReturn($result, 'json');
        }
    }

    /**
     * 修改密码
     */
    public function update() {
        $oldPwd = I('oldPwd');
        $newPwd1 = I('newPwd1');
        $newPwd2 = I('newPwd2');
        $admin = session('admin');
        $result = array('code' => 1);
        if (!$oldPwd || !$newPwd1 || !$newPwd2) {
            $result['msg'] = '密码不能为空';
        } elseif (strlen($newPwd1) < 5 || strlen($newPwd2) < 5) {
            $result['msg'] = '密码长度不能小于6位数';
        } elseif ($oldPwd != $admin['password']) {
            $result['msg'] = '原密码错误';
        } elseif ($newPwd1 != $newPwd2) {
            $result['msg'] = '两次输入的新密码不一致';
        } else {
            $admin['password'] = $newPwd1;
            $res = D('Admin')->save($admin);
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '修改成功，需重新登录';
                session(null);
            } else {
                $result['msg'] = '修改失败';
            }
            $result['data'] = $res;
        }
        $this->ajaxReturn($result, 'json');
    }
}