<?php
namespace Home\Controller;
use Think\Controller;

class LoginController extends Controller {
    public function index(){
        if (session('user')) {
            redirect('/Home/Index');
        } else {
            $this->display();
        }
    }

    public function register() {
        if (session('user')) {
            redirect('/Home/Index');
        } else {
            $this->display();
        }
    }

    public function doregister() {
        $result = array('code' => 1);
        if ($_POST) {
            if ($this->checkPhone($_POST['phone'])) {
                if (strlen($_POST['password']) >= 6) {
                    if (strtoupper($_POST['verifyCode']) == strtoupper(session('verifyCode'))) {
                        $data = array(
                            'phone' => $_POST['phone'],
                            'username' => $_POST['phone'],
                            'password' => md5($_POST['password'] . C('salt')),
                            'create_time' => time(),
                            'update_time' => time(),
                            'login_time' => time()
                        );
                        $res = M('user')->data($data)->add();
                        if ($res) {
                            $result['code'] = 0;
                            $result['msg'] = '注册成功';
                            session('user', M('user')->where(array('phone' => $data['phone']))->find());
                            session('verifyCode', null);
                        } else {
                            $result['msg'] = '注册失败，系统错误';
                        }
                    } else {
                        $result['msg'] = '验证码错误';
                    }
                } else {
                    $result['msg'] = '密码长度不能小于6位';
                }
            } else {
                $result['msg'] = '手机号已经被注册，请直接登陆';
            }
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    private function checkPhone($phone) {
        return M('user')->where(array('phone' => $phone))->count() == 0;
    }

    public function captcha() {
        $img = new \VerifyImage();
        $img->createImage(3);
        session('verifyCode', $img->getVerifyCode());
    }

    public function login() {
        if (session('user')) {
            redirect('/Home/Index');
        } else {
            $phone = I('phone');
            $password = I('password');
            $result = array('code' => 1);
            if ($phone) {
                if ($password) {
                    $data = array('phone' => $phone);
                    $user = M('user')->where($data)->find();
                    if ($user) {
                        if ($user['password'] == md5($password . C('salt'))) {
                            $user['login_time'] = time();
                            M('user')->save($user);
                            $loginMsgModel = M('login_msg');
                            $today =  date('Y-m-d');
                            $todayLoginMsg = $loginMsgModel->where(array('date' => $today))->find();
                            if ($todayLoginMsg) {
                                $loginMsgModel->where(array('date' => $today))->setInc('count');
                            } else {
                                $loginMsgModel->data(array('date' => $today, 'count' => 1))->add();
                            }
                            session('user', $user);
                            $result['code'] = 0;
                            $result['msg'] = '登陆成功';
                        } else {
                            $result['msg'] = '密码错误';
                        }
                    } else {
                        $result['msg'] = '此手机号未注册';
                    }
                } else {
                    $result['msg'] = '请输入密码';
                }
            } else {
                $result['msg'] = '请输入手机号';
            }
            $this->ajaxReturn($result, 'json');
        }
    }

    public function logout() {
        session('user', null);
        redirect('/Home/Login');
    }
}