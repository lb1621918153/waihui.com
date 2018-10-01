<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 22:46
 */

namespace Admin\Controller;


class WithdrawalController extends BaseController
{
    public function index()
    {
        $withdrawalModel = M('withdrawal');
        $totalCount = $withdrawalModel->count();
        $page = getPage($totalCount);
        $withdrawals =$withdrawalModel->field("withdrawal_id, user_id, username, withdrawal.money, withdrawal.status, msg, withdrawal.create_time")->join("user ON id = user_id")->order('withdrawal.create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('withdrawals', $withdrawals);
        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有提现记录！</div>');
        $this->display();
    }

    public function refuse()
    {
        $id = I('id');
        $msg = I('msg');
        $result = array('code' => 1);
        if (!$id || !$msg) {
            $result['msg'] = '未收到数据';
        } else {
            $data = array(
                'withdrawal_id' => $id,
                'msg' => $msg,
                'status' => -1,
                'update_time' => time()
            );
            $res = M('withdrawal')->save($data);
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '操作成功';
            } else {
                $result['msg'] = '操作失败';
            }
        }
        $this->ajaxReturn($result, 'json');
    }

    public function withdrawal()
    {
        $id = I('id');
        $result = array('code' => 1);
        if (!$id) {
            $result['msg'] = '未收到数据';
        } else {
            $withdrawalModel = M('withdrawal');
            $withdrawalModel->startTrans();
            $withdrawal = $withdrawalModel->where(array('withdrawal_id' => $id))->find();
            if ($withdrawal) {
                $user = M('user')->where(array('id' => $withdrawal['user_id']))->find();
                if ($user) {
                    if (floatval($user['money']) - floatval($withdrawal['money']) > 0) {
                        $res = M('user')->where(array('id' => $withdrawal['user_id']))->setDec('money', $withdrawal['money']);
                        if ($res) {
                            $withdrawal['status'] = 1;
                            $withdrawalModel->save($withdrawal);
                            $withdrawalModel->commit();
                            $result['code'] = 0;
                            $result['msg'] = '操作成功';
                        } else {
                            $withdrawalModel->rollback();
                            $result['msg'] = '操作失败，请刷新页面重试';
                        }
                    } else {
                        $withdrawal['status'] = -1;
                        $withdrawal['msg'] = "用户余额不足";
                        $withdrawalModel->save($withdrawal);
                        $withdrawalModel->commit();
                        $result['code'] = 0;
                        $result['msg'] = '操作失败，用户余额不足';
                    }
                } else {
                    $result['msg'] = '操作失败，用户不存在';
                }
            } else {
                $result['msg'] = '操作失败，订单不存在，请刷新页面重试';
            }
        }
        $this->ajaxReturn($result, 'json');
    }
}