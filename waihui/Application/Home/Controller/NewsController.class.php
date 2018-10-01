<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/18
 * Time: 20:06
 */

namespace Home\Controller;


class NewsController extends BaseController
{
    public function index() {
        $newsModel = M('news');
        $page = getPage($newsModel->count());
        $newses = $newsModel->field('news_id, news_title, create_time')->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('newses', $newses);

        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有财经新闻信息！</div>');
        $this->display();
    }

    public function detail() {
        $id = I('id');
        if (!$id) {
            $this->error("没有此页面");
        } else {
            $news = M('news')->field('news_title, news_content, create_time')->where(array('news_id' => $id))->find();
            if ($news) {
                $this->assign('news', $news);
                $this->display();
            } else {
                $this->error("没有此页面");
            }
        }
    }
}