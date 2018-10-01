<?php
namespace Home\Controller;


class IndexController extends BaseController {
    public function index(){
        $this->init();
        $this->display();
    }

    private function init() {
        $hotNews = M('news')->where(array('hot' => 1))->limit(3)->select();
        $newses = M('news')->where('news_id!=1')->limit('5')->select();

        $this->assign('hotNews', $hotNews);
        $this->assign('newses', $newses);
    }
}
