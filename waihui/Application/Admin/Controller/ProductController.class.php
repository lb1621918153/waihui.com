<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/14
 * Time: 10:36
 */

namespace Admin\Controller;


class ProductController extends BaseController
{
    public function index() {
        $productModel = M('product');
        $totalCount = $productModel->count();
        $page = getPage($totalCount);
        $products =$productModel->limit($page->firstRow . ',' . $page->listRows)->select();
        $this->assign('products', $products);
        $this->assign('page', $page->show());
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有产品信息！</div>');
        $this->display();
    }

    public function add() {
        if ($_POST) {
            if (!I('product_name')) {
                $this->error('产品名称不能为空');
            } elseif (!I('current')) {
                $this->error('当前值不能为空');
            } else {
                $res = M('product')->data($_POST)->add();
                if ($res) {
                    $this->success('添加成功', '/Admin/Product');
                } else {
                    $this->success('添加失败');
                }
            }
        } else {
            $this->display();
        }
    }

    public function update() {
        $data = I();
        $res = M('product')->save($data);
        if ($res !== false) {
            $this->success('保存成功', '/Admin/Product');
        } else {
            $this->error('操作失败');
        }
    }

    public function detail() {
        $id = I('id');
        if ($id) {
            $product = M('product')->where(array('id' => $id))->find();
            if ($product) {
                $this->assign('product', $product);
                $this->display();
            } else {
                $this->error("没有此页面");
            }
        } else {
            $this->error("没有此页面");
        }
    }

    public function del() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res = M('product')->where(array('id' => $id))->delete();
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

    public function enable() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res = M('product')->save(array('id' => $id, 'enable' => 1));
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

    public function disenable() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $res = M('product')->save(array('id' => $id, 'enable' => 0));
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
}