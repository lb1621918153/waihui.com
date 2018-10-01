<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/10
 * Time: 20:37
 */

namespace Admin\Controller;


class UserController extends BaseController
{
    public function Index() {
        $userModel = D("User");
        $totalCount = $userModel->count();
        $page = getPage($totalCount);
        $users = $userModel->limit($page->firstRow . ',' . $page->listRows)->select();
        $verifyCount = $userModel->where(array('status' => 1))->count();

        $this->assign('users', $users);
        $this->assign('page', $page->show());
        $this->assign('verifyCount', $verifyCount);
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有用户注册！</div>');
        $this->display();
    }

    public function verify() {
        $verifyCount = M('user')->where(array('status' => 1))->count();
        if ($verifyCount <= 0) {
            $this->redirect('/Admin/User/Index');
        } else {
            $verifyUsers = M('user')->where(array('status' => 1))->limit(20)->select();

            $this->assign('verifyUsers', $verifyUsers);
            $this->display();
        }
    }

    public function doVerify() {
        $id = $_POST['id'];
        $result = array('code' => 1);
        if ($id) {
            $res = M('user')->save(array('id' => $id, 'status' => 2));
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

    public function refuseVerify() {
        $id = $_POST['id'];
        $result = array('code' => 1);
        if ($id) {
            $res = M('user')->save(array('id' => $id, 'status' => -1));
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

    public function del() {
        $id = I('id');
        $result = array();
        if (!$id) {
            $result['code'] = 1;
            $result['msg'] = "未收到数据";
        } else {
            $res = D('User')->where(array('id' => $id))->delete();
            if (!$res) {
                $result['code'] = 1;
                $result['msg'] = "数据不存在，请刷新页面";
            } else {
                $result['code'] = 0;
                $result['msg'] = "删除成功";
            }
        }
        $this->ajaxReturn($result, 'json');
    }

    public function detail() {
        $id = I('id');
        if (!$id) {
            $this->error("没有此页面");
        } else {
            $user = D('User')->where(array('id' => $id))->find();
            if ($user) {
                $rechargeModel = M('recharge');
                $withdrawalModel = M('withdrawal');
                $rechargeTotalCount = $rechargeModel->count();
                $withdrawalTotalCount = $withdrawalModel->count();
                $rechargePage = getPage($rechargeTotalCount, 5);
                $withdrawalPage = getPage($withdrawalTotalCount, 5);
                $recharges = $rechargeModel->limit($rechargePage->firstRow . ',' . $rechargePage->listRows)->select();
                $withdrawals = $withdrawalModel->limit($withdrawalPage->firstRow . ',' . $withdrawalPage->listRows)->select();
                $this->assign('user', $user);
                $this->assign('recharges', $recharges);
                $this->assign('rechargePage', $rechargePage->show());
                $this->assign('withdrawals', $withdrawals);
                $this->assign('withdrawalPage', $withdrawalPage->show());
                $this->display();
            } else {
                $this->error("没有此页面");
            }
        }
    }
}