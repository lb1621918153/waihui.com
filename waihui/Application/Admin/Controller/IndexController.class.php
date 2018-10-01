<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/10
 * Time: 18:45
 */

namespace Admin\Controller;


class IndexController extends BaseController
{
    public function index()
    {
        $this->init();
        $this->display();
    }

    /**
     * 近一周内登陆信息数据
     *
     * @return array
     */
    private function loginMsg() {
        $loginMsgList = M('login_msg')->order('date desc')->limit(7)->select();
        $loginMsg = array(
            'label' => array(),
            'data' => array()
        );
        foreach ($loginMsgList as $value) {
            $loginMsg['label'][] = $value['date'];
            $loginMsg['data'][] = $value['count'];
        }
        $loginMsg['label'] = array_reverse($loginMsg['label']);
        $loginMsg['data'] = array_reverse($loginMsg['data']);
        return $loginMsg;
    }

    /**
     * 后台主页的显示信息
     */
    private function init() {
        $today = date('Y/m/d');
        $userCount = M('user')->count();
        $orderCount = M('order')->where(array('status' => 1))->count();
        $rechargeCount = M('recharge')->count();
        $withdrawalCount = M('withdrawal')->count();
        $recharges = M('recharge')->field("recharge_id, user_id, username, recharge.money, recharge.status, msg, detail, recharge.create_time")->join("user ON id = user_id")->order('recharge.create_time desc')->limit(5)->select();
        $withdrawals = M('withdrawal')->field("withdrawal_id, user_id, username, withdrawal.money, withdrawal.status, msg, withdrawal.create_time")->join("user ON id = user_id")->order('withdrawal.create_time desc')->limit(5)->select();
        $loginMsg = $this->loginMsg();


        $this->assign('today', $today);
        $this->assign('userCount', $userCount);
        $this->assign('orderCount', $orderCount);
        $this->assign('rechargeCount', $rechargeCount);
        $this->assign('withdrawalCount', $withdrawalCount);
        $this->assign('recharges', $recharges);
        $this->assign('withdrawals', $withdrawals);
        $this->assign('loginMsg', $loginMsg);
    }
}