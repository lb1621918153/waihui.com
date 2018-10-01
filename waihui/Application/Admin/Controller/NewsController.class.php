<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/18
 * Time: 20:06
 */

namespace Admin\Controller;


class NewsController extends BaseController
{
    public function index() {
        $newsModel = M('news');
        $page = getPage($newsModel->count());
        $newses = $newsModel->order('create_time desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $this->assign('newses', $newses);
        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有财经新闻信息！</div>');
        $this->display();
    }

    public function add() {
        $images = getAllFileName(dirname(dirname(dirname(dirname(__FILE__)))) . '/Public/upload/news');
        if ($images) {
            foreach ($images as $key => $fileName) {
                $images[$key] = '/upload/news/' . $fileName;
            }
        }
        $this->assign('images', $images);
        $this->display();
    }

    public function del() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res = M('news')->where(array('news_id' => $id))->delete();
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

    public function doadd() {
        $data = $_POST;
        if ($data) {
            if (!$data['news_title']) {
                $this->error('新闻名称不能为空');
            } elseif (!$data['news_content']) {
                $this->error('新闻内容不能为空');
            } else {
                if ($data['hot'] == 1 && !$data['news_thum']) {
                    $this->error('热点新闻将会被放置在首页banner图中，必须要有图片');
                } else {
                    $data['create_by'] = session('user.id');
                    $data['create_time'] = time();
                    $data['update_time'] = time();
                    $res = M('news')->data($data)->add();
                    if ($res) {
                        $this->success('保存成功', '/Admin/News');
                    } else {
                        $this->error('保存失败');
                    }
                }
            }
        } else {
            $this->error('未收到数据');
        }
    }

    public function detail() {
        $id = I('id');
        if (!$id) {
            $this->error("没有此页面");
        } else {
            $news = M('news')->where(array('news_id' => $id))->find();
            if ($news) {
                $images = getAllFileName(dirname(dirname(dirname(dirname(__FILE__)))) . '/Public/upload/news');
                if ($images) {
                    foreach ($images as $key => $fileName) {
                        $images[$key] = '/upload/news/' . $fileName;
                    }
                }
                $this->assign('images', $images);
                $this->assign('news', $news);
                $this->display();
            } else {
                $this->error("没有此页面");
            }
        }
    }

    public function update() {
        $data = $_POST;
        if ($data['news_title']) {
            if ($data['news_content']) {
                if ($data['hot'] == 1 && !$data['news_thum']) {
                    $this->error('保存失败，当为热点新闻时，必须要有图片');
                } else {
                    $res = M('news')->save($data);
                    if ($res !== false) {
                        $this->success('保存成功', '/Admin/News');
                    } else {
                        $this->error('操作失败');
                    }
                }
            } else {
                $this->error('保存失败, 新闻内容不能为空');
            }
        } else {
            $this->error('保存失败, 新闻名称不能为空');
        }
    }
}