<?php
namespace Home\Controller;


class UserController extends BaseController {
    public function Index(){
        $user = M('user')->where(array('id' => session('user.id')))->find();
        session('user', $user);
        $this->display();
    }

    public function updateHeadImg() {
        $headImg = $_POST['headImg'];
        $result = array('code' => 1);
        if ($headImg) {
            $id = session('user.id');
            $data = array('id' => $id, 'head_img' => $headImg);
            $res = M('user')->save($data);
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '修改成功';
                $user = session('user');
                $user['head_img'] = $headImg;
                session('user', $user);
            } else {
                $result['msg'] = '修改失败，请刷新页面重试';
            }
        } else {
            $result['msg'] = '修改失败';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 用户提交申请页面
     */
    public function Recharge() {
        $bankCards = M('bank_card')->select();
        $this->assign('bankCards', $bankCards);
        $this->display();
    }

    /**
     * 查看所有充值申请
     */
    public function allrecharge() {
        $option = array('user_id' => session('user.id'));
        $rechargeModel = M('recharge');
        $page = getPage($rechargeModel->where($option)->count());
        $recharges = $rechargeModel->where($option)->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('recharges', $recharges);
        $this->assign('page', $page->show());
        $this->assign('empty', '没有充值记录');
        $this->display();
    }

    /**
     * 用户编辑充值申请
     */
    public function editrecharge() {
        if ($_POST) {
            $data = $_POST;
            $result = array('code' => 1);
            if (!$data['recharge_id']) {
                $result['msg'] = '未接收到数据';
            } elseif (!$data['money'] || $data['money'] == '0') {
                $result['msg'] = '充值金额不能为0';
            } elseif (!$data['detail']) {
                $result['msg'] = '汇款信息不能为空';
            } else {
                $data['update_time'] = time();
                $data['status'] = 0;
                $res = M('recharge')->save($data);
                if ($res) {
                    $result['code'] = 0;
                    $result['msg'] = '提交成功，等待后台审核后即可使用';
                } else {
                    $result['msg'] = '提交失败，请联系站点管理员';
                }
            }
            $this->ajaxReturn($result, 'json');
        } else {
            $id = $_GET['id'];
            if ($id) {
                $recharge = M('recharge')->where(array('recharge_id' => $id))->find();
                $bankCards = M('bank_card')->select();
                $this->assign('bankCards', $bankCards);
                $this->assign('recharge', $recharge);
                $this->display();
            } else {
                $this->error('没有此页面');
            }

        }
    }

    /**
     * 用户提交充值申请
     */
    public function dorecharge() {
        $data = $_POST;
        $result = array('code' => 1);
        if (!$data['money'] || $data['money'] == '0') {
            $result['msg'] = '充值金额不能为0';
        } elseif (!$data['detail']) {
            $result['msg'] = '汇款信息不能为空';
        } else {
            $user = session('user');
            $data['user_id'] = $user['id'];
            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['msg'] = '充值申请';
            $res = M('recharge')->data($data)->add();
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '充值成功，等待后台审核后即可使用';
            } else {
                $result['msg'] = '充值失败，请联系站点管理员';
            }
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 用户删除充值申请
     */
    public function delRecharge() {
        $rechargeId = I('id');
        $result = array('code' => 1);
        if ($rechargeId) {
            $res = M('recharge')->where(array('recharge_id' => $rechargeId, 'status' => array('neq', 1)))->delete();
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '删除成功';
            } else {
                $result['msg'] = '删除失败，请刷新页面重试';
            }
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 用户提交申请页面
     */
    public function Withdrawal() {
        $user = M('user')->where(array('id' => session('user.id')))->find();
        session('user', $user);
        $curMoney = $user['money'];
        $totalWithdrawalMoney = M('withdrawal')->where(array('user_id' => session('user.id'), 'status' => 0))->sum('money');
        $totalWithdrawalMoney = $totalWithdrawalMoney ? $totalWithdrawalMoney : 0;
        $freeMoney = $curMoney - $totalWithdrawalMoney;

        $this->assign('curMoney', $curMoney);
        $this->assign('totalWithdrawalMoney', $totalWithdrawalMoney);
        $this->assign('freeMoney', $freeMoney);
        $this->display();
    }

    /**
     * 查看所有的提现申请
     */
    public function allwithdrawal() {
        $option = array('user_id' => session('user.id'));
        $withdrawalModel = M('withdrawal');
        $page = getPage($withdrawalModel->where($option)->count());
        $withdrawals = $withdrawalModel->where($option)->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('withdrawals', $withdrawals);
        $this->assign('page', $page->show());
        $this->assign('empty', '没有提现记录');
        $this->display();
    }

    public function dowithdrawal() {
        $money = $_POST['money'];
        $result = array('code' => 1);
        $result['money'] = $money;
        if ($money != '') {
            $money = floatval($money);
            if ($money > 0) {
                $user = M('user')->where(array('id' => session('user.id')))->find();
                session('user', $user);
                if ($user['bank_card_num']) {
                    if ($user['status'] == 2) {
                        $curMoney = $user['money'];
                        $totalWithdrawalMoney = M('withdrawal')->where(array('user_id' => session('user.id'), 'status' => 0))->sum('money');
                        $freeMoney = $curMoney - $totalWithdrawalMoney;
                        if ($money <= floatval($freeMoney)) {
                            $data = array(
                                'user_id' => session('user.id'),
                                'money' => $money,
                                'msg' => '提现申请中',
                                'create_time' => time(),
                                'update_time' => time()
                            );
                            $res = M('withdrawal')->data($data)->add();
                            if ($res) {
                                $result['code'] = 0;
                                $result['msg'] = '提现申请成功';
                            } else {
                                $result['msg'] = '提现失败，请刷新页面重试';
                            }
                        } else {
                            $result['msg'] = '提现金额不能多余可提现余额，当前可提现余额为：' . $freeMoney;
                        }
                    } else {
                        $result['msg'] = '请先实名认证后在提现';
                    }
                } else {
                    $result['msg'] = '提现需要银行卡信息，请先到修改信息中填写';
                }
            } else {
                $result['msg'] = '提现金额不能少于0元';
            }
        } else {
            $result['msg'] = '请填写提现金额';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 用户删除提现申请
     */
    public function delwithdrawal() {
        $withdrawalId = I('id');
        $result = array('code' => 1);
        if ($withdrawalId) {
            $res = M('withdrawal')->where(array('withdrawal_id' => $withdrawalId, 'status' => array('neq', 1)))->delete();
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '删除成功';
            } else {
                $result['msg'] = '删除失败，请刷新页面重试';
            }
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 修改密码
     */
    public function Passwordedit() {
        $this->display();
    }

    public function updatePwd() {
        $result = array('code' => 1);
        if ($_POST) {
            $user = session('user');
            if (md5($_POST['oldPwd'] . C('salt')) == $user['password']) {
                $user['password'] = md5($_POST['newPwd'] . C('salt'));
                $res = M('user')->save($user);
                if ($res) {
                    $result['code'] = 0;
                    $result['msg'] = '修改成功';
                    session('user', $user);
                } else {
                    $result['msg'] = '修改失败';
                }
            } else {
                $result['msg'] = '原密码错误';
            }
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    /**
     * 用户修改信息
     */
    public function Useredit() {
        if ($_POST) {
            $result = array('code' => 1);
            $username = $_POST['username'];
            $bankCardNum = $_POST['bankCardNum'];
            if ($username) {
                $data = array(
                    'id' => session('user.id'),
                    'username' => $username,
                    'bank_card_num' => $bankCardNum
                );
                $res = M('user')->save($data);
                if ($res !== false) {
                    $result['code'] = 0;
                    $result['msg'] = '修改成功';
                    $user = session('user');
                    $user['username'] = $username;
                    $user['bank_card_num'] = $bankCardNum;
                    session('user', $user);
                } else {
                    $result['msg'] = '修改失败，请刷新页面重试';
                }
            } else {
                $result['msg'] = '用户名不能为空';
            }
            $this->ajaxReturn($result, 'json');
        } else {
            $this->display();
        }
    }

    /**
     * 实名认证
     */
    public function Userverify() {
        if ($_POST) {
            $result = array('code' => 1);
            $trueName = $_POST['trueName'];
            $trueId = $_POST['trueId'];
            if ($trueName && $trueId) {
                $id = session('user.id');
                $user = M('user')->where(array('id' => $id))->find();
                if ($user['status'] != 2) {
                    $user['status'] = 1;
                    $user['true_name'] = $trueName;
                    $user['true_id'] = $trueId;
                    $user['update_time'] = time();
                    $res = M('user')->save($user);
                    if ($res) {
                        session('user', $user);
                        $result['code'] = 0;
                        $result['msg'] = '申请成功';
                    } else {
                        $result['msg'] = '认证失败，请刷新页面重试';
                    }
                } else {
                    $result['msg'] = '已经认证成功了';
                }
            } else {
                $result['msg'] = '真实姓名和身份证不能为空';
            }
            $this->ajaxReturn($result, 'json');
        } else {
            $this->display();
        }
    }
}
