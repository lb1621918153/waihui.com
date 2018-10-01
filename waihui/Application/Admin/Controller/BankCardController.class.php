<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 14:32
 */

namespace Admin\Controller;


class BankCardController extends BaseController
{
    public function index()
    {
        $bankCards = M("bank_card")->select();
        $this->assign('bankCards', $bankCards);
        $this->assign('empty', '<div class="text-center" style="font-size: 24px;">还没有银行卡！</div>');
        $this->display();
    }

    public function add()
    {
        $bankCardNum = I('bank_card_num');
        $intro = I('intro');
        $result = array('code' => 1);
        if (!$bankCardNum || !$intro) {
            $result['msg'] = "银行卡号不能为空";
        } else {
            $bankCard = M('bank_card');
            $data = array(
                'bank_card_num' => $bankCardNum,
                'intro' => $intro
            );
            $res = $bankCard->add($data);
            if ($res) {
                $result['code'] = 0;
                $result['msg'] = "添加成功";
            } else {
                $result['msg'] = "添加失败";
            }
        }
        $this->ajaxReturn($result, 'json');
    }

    public function del()
    {
        $id = I('id');
        $result = array();
        if (!$id) {
            $result['code'] = 1;
            $result['msg'] = "未收到数据";
        } else {
            $res = M('bank_card')->where(array('card_id' => $id))->delete();
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
}