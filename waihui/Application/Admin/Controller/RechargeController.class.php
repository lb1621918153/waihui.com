<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 22:46
 */

namespace Admin\Controller;


class RechargeController extends BaseController
{
    public function index()
    {
        $rechargeModel = M('recharge');
        $totalCount = $rechargeModel->count();
        $page = getPage($totalCount);
        $recharges =$rechargeModel->field("recharge_id, user_id, username, recharge.money, recharge.status, msg, detail, recharge.create_time")->join("user ON id = user_id")->order('recharge.create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('recharges', $recharges);
        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有充值记录！</div>');
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
                'recharge_id' => $id,
                'msg' => $msg,
                'status' => -1
            );
            $res = M('recharge')->save($data);
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = '操作成功';
            } else {
                $result['msg'] = '操作失败';
            }
        }
        $this->ajaxReturn($result, 'json');
    }

    public function recharge()
    {
        $id = I('id');
        $result = array('code' => 1);
        if (!$id) {
            $result['msg'] = '未收到数据';
        } else {
            $rechargeModel = M('recharge');
            $recharge = $rechargeModel->where(array('recharge_id' => $id))->find();
            if ($recharge) {
                $rechargeModel->startTrans();
                $res = M('user')->where(array('id' => $recharge['user_id']))->setInc('money', $recharge['money']);
                if ($res) {
                    $recharge['status'] = 1;
                    $rechargeModel->save($recharge);
                    $rechargeModel->commit();
                    $result['code'] = 0;
                    $result['msg'] = '操作成功';
                } else {
                    $rechargeModel->rollback();
                    $result['msg'] = '操作失败，请刷新页面重试';
                }
            } else {
                $result['msg'] = '操作失败，请刷新页面重试';
            }
        }
        $this->ajaxReturn($result, 'json');
    }
}