<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/13
 * Time: 13:43
 */

namespace Admin\Controller;


class CalendarController extends BaseController
{
    public function index() {
        $calendarModel = M('calendar');
        $count = $calendarModel->count();
        $page = getPage($count);
        $calendars = $calendarModel->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('calendars', $calendars);
        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有财经日历信息！</div>');
        $this->display();
    }

    public function update() {
        $data = I();
        $data['expected'] = strlen($data['expected']) == 0 ? null : $data['expected'];
        $data['announce'] = strlen($data['announce']) == 0 ? null : $data['announce'];
        $res = M('calendar')->save($data);
        if ($res !== false) {
            $this->success('保存成功', '/Admin/Calendar');
        } else {
            $this->error('操作失败');
        }
    }

    public function add() {
        $data = $_POST;
        if ($data) {
            if ($data['area'] == '') {
                $this->error('地区不能为空');
                return;
            }
            if ($data['date'] == '') {
                $this->error('日期不能为空');
                return;
            }
            if ($data['time'] == '') {
                $this->error('时间不能为空');
                return;
            }
            if ($data['name'] == '') {
                $this->error('指标名称不能为空');
                return;
            }
            $data['before_value'] = strlen($data['before_value']) == 0 ? null : $data['before_value'];
            $data['expected'] = strlen($data['expected']) == 0 ? null : $data['expected'];
            $data['announce'] = strlen($data['announce']) == 0 ? null : $data['announce'];
            $res = M('calendar')->data($data)->add();
            if ($res) {
                $this->success('添加成功', '/Admin/Calendar');
            } else {
                $this->error('添加失败');
            }
        } else {
            $images = getAllFileName(dirname(dirname(dirname(dirname(__FILE__)))) . '/Public/upload/calendar');
            if ($images) {
                foreach ($images as $key => $fileName) {
                    $images[$key] = '/upload/calendar/' . $fileName;
                }
            }
            $this->assign('images', $images);
            $this->display();
        }
    }

    public function del() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res = M('calendar')->where(array('id' => $id))->delete();
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

    public function detail() {
        $id = I('id');
        if (!$id) {
            $this->error("没有此页面");
        } else {
            $calendar = M('calendar')->where(array('id' => $id))->find();
            if ($calendar) {
                $images = getAllFileName(dirname(dirname(dirname(dirname(__FILE__)))) . '/Public/upload/calendar');
                if ($images) {
                    foreach ($images as $key => $fileName) {
                        $images[$key] = '/upload/calendar/' . $fileName;
                    }
                }
                $this->assign('images', $images);
                $this->assign('calendar', $calendar);
                $this->display();
            } else {
                $this->error("没有此页面");
            }
        }
    }
}