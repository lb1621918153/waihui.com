<?php
namespace Home\Controller;


class ProductController extends BaseController {
    public function index(){
        $products = M('product')->where(array('enable' => 1))->select();
        $this->assign('products', $products);
        $this->assign('empty', '<div class="text-center" style="font-size: 24px; line-height: 50px;">还没有上架产品！</div>');
        $this->display();
    }

    public function getProduct() {
        $id = I('id');
        $result = array('code' => 1);
        if ($id) {
            $product = M('product')->where(array('id' => $id))->find();
            $result['code'] = 0;
            $result['msg'] = '查找成功';
            $result['data'] = $product;
        } else {
            $result['msg'] = '未收到数据';
        }
        $this->ajaxReturn($result, 'json');
    }

    public function detail() {
        $id = I('id');
        if ($id) {
            $product = M('product')->where(array('id' => $id))->find();
            if ($product) {
                $this->assign('product', $product);
                $this->display();
            } else {
                $this->error('没有此页面');
            }
        } else {
            $this->error('没有此页面');
        }
    }
}