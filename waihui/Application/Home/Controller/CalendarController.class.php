<?php
namespace Home\Controller;


class CalendarController extends BaseController {
    public function index(){
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $calendarModel = M('calendar');
        $page = getPage($calendarModel->where(array('date' => $date))->count());
        $calendars = $calendarModel->where(array('date' => $date))->order('time')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('page', $page->show());
        $this->assign('today', $date);
        $this->assign('calendars', $calendars);
        $this->assign('empty', '<div style="font-size: 24px; text-align: center; line-height: 44px">' . $date . ' 没有财经日历信息' . '</div>');
        $this->display();
    }
}