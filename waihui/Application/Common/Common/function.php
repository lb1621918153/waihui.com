<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/11
 * Time: 12:58
 */

/**
 * @param $trueName
 * @return string
 */
function showUserTrueName($trueName) {
    return ($trueName != '' && $trueName != null) ? $trueName : '未实名认证';
}

function showOrderSell($trueName) {
    return ($trueName != '' && $trueName != null) ? $trueName : '未结算';
}

function showRechargeStatus($status) {
    if ($status == 0) {
        return '<span class="label label-warning">申请中</span>';
    } elseif ($status == 1) {
        return '<span class="label label-success">充值成功</span>';
    } elseif ($status == -1) {
        return '<span class="label label-default">充值失败</span>';
    }
}

function showOrderStatus($status) {
    if ($status == 0) {
        return '<span class="label label-warning">未结算</span>';
    } elseif ($status == 1) {
        return '<span class="label label-success">已结算</span>';
    } elseif ($status == -1) {
        return '<span class="label label-default">结算失败</span>';
    }
}

function showWithdrawalStatus($status) {
    if ($status == 0) {
        return '<span class="label label-warning">申请中</span>';
    } elseif ($status == 1) {
        return '<span class="label label-success">提现成功</span>';
    } elseif ($status == -1) {
        return '<span class="label label-default">提现失败</span>';
    }
}


function showUserMsg($msg) {
    return ($msg != '' && $msg != null) ? $msg : '未填写';
}

/**
 * 前台显示身份证信息
 *
 * @param $id
 * @return string
 */
function showUserTrueId($id) {
    if (($id != '' && $id != null)) {
        return substr($id, 0, 4) . '*****' . substr($id, strlen($id) - 4);
    } else {
        return '未填写';
    }
}

function emptyNum($num) {
    return ($num != '' && $num != null) ? $num : '---';
}

/**
 * 每次显示一定个数的文字，其余显示...
 * @param $msg
 * @param $length
 * @return string
 */
function showLimitMsg($msg, $length = 10) {
    if (!$msg || mb_strlen($msg, 'utf-8') < $length) {
        return $msg;
    }
    return mb_substr($msg, 0, $length, 'utf-8') . '...';
}

function hotMsg($hot) {
    if ($hot == 0) {
        return '否';
    } else {
        return '是';
    }
}

/**
 * 获取某个目录下的所有文件名
 *
 * @param $dir
 * @return array|null
 */
function getAllFileName($dir) {
    if (is_dir($dir)) {
        return array_filter(scandir($dir), 'fileNameFilter');
    } else {
        return null;
    }
}

function fileNameFilter($val) {
    return $val != '.' && $val != '..';
}

/**
 * 将时间戳格式化
 *
 * @param $timestamp
 * @return false|string
 */
function showDateTime($timestamp) {
    return $timestamp == 0 ? "未登陆过" : date('Y-m-d H:i:s', $timestamp);
}

/**
 * 分页设置
 *
 * @param $totalCount
 * @param int $pageSize
 * @return \Think\Page
 */
function getPage($totalCount, $pageSize = 10) {
    $page = new \Think\Page($totalCount, $pageSize);
    $page->setConfig('header', '&nbsp;<li class="rows"> 第<b> %NOW_PAGE% </b>页/共<b> %TOTAL_PAGE% </b>页</li>');
    $page->setConfig('prev', '上一页');
    $page->setConfig('next', '下一页');
    $page->setConfig('last', '尾页');
    $page->setConfig('first', '首页');
    $page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $page->lastSuffix = false;
    return $page;
}

/**
 * 根据calendar的effect字段，设置影响CSS样式
 *
 * @param $effect
 * @return string
 */
function calendarStyle ($effect) {
    if (strpos($effect, '利空') !== false) {
        return 'likong';
    }
    if (strpos($effect, '利多') !== false) {
        return 'liduo';
    }
    return '';
}

/**
 * 显示用户实名认证情况
 * @param $status
 * @return string
 */
function userVerify($status) {
    if ($status == 0) {
        return '未认证';
    } elseif ($status == 1) {
        return '实名认证中';
    } elseif ($status == 2) {
        return '实名认证成功';
    } else {
        return '实名认证失败';
    }
}

function userVerifyBtn($status) {
    if ($status == 0) {
        return '申请认证';
    } elseif ($status == 1) {
        return '修改认证信息';
    } elseif ($status == 2) {
        return '已认证';
    } else {
        return '重新认证';
    }
}

/**
 * 数字格式化
 *
 * @param $num
 * @return boolean|string
 */
function num_format($num) {
    if(!is_numeric($num)){
        return false;
    }
    $num = explode('.',$num);//把整数和小数分开
    $rl = $num[1];//小数部分的值
    $j = strlen($num[0]) % 3;//整数有多少位
    $sl = substr($num[0], 0, $j);//前面不满三位的数取出来
    $sr = substr($num[0], $j);//后面的满三位的数取出来
    $i = 0;
    $rvalue = '';
    while($i <= strlen($sr)){
        $rvalue = $rvalue.','.substr($sr, $i, 3);//三位三位取出再合并，按逗号隔开
        $i = $i + 3;
    }
    $rvalue = $sl.$rvalue;
    $rvalue = substr($rvalue,0,strlen($rvalue)-1);//去掉最后一个逗号
    $rvalue = explode(',',$rvalue);//分解成数组
    if($rvalue[0]==0){
        array_shift($rvalue);//如果第一个元素为0，删除第一个元素
    }
    $rv = $rvalue[0];//前面不满三位的数
    for($i = 1; $i < count($rvalue); $i++){
        $rv = $rv.','.$rvalue[$i];
    }
    if(!empty($rl)){
        $rvalue = $rv.'.'.$rl;//小数不为空，整数和小数合并
    }else{
        $rvalue = $rv;//小数为空，只有整数
    }
    return $rvalue;
}

/**
 * @param $timestamp
 * @return false|string
 * 显示结算时间
 */
function showSellTime($timestamp) {
    return $timestamp == 0 ? "未结算" : date('Y-m-d H:i:s', $timestamp);
}