<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/13
 * Time: 16:01
 */

namespace Admin\Controller;


class ImageController extends \Think\Controller
{
    public function calendarUpload() {
        $result = $this->upload('calendar/');
        $this->ajaxReturn($result, 'json');
    }

    public function newsUpload() {
        $result = $this->upload('news/');
        $this->ajaxReturn($result, 'json');
    }

    public function userUpload() {
        $result = $this->upload('user/');
        $this->ajaxReturn($result, 'json');
    }

    private function upload($savePath) {
        $upload = new \Think\Upload();
        $upload->exts = array('jpg', 'jpeg', 'gif', 'png');
        $upload->maxSize = 1024 * 1024 * 3;
        $upload->rootPath = dirname(dirname(dirname(dirname(__FILE__)))) . '/Public/upload/';
        $upload->savePath = $savePath;
        $upload->autoSub = false;
        $info = $upload->uploadOne($_FILES['area_img']);
        $result = array('code' => 1);
        if ($info) {
            $result['code'] = 0;
            $result['msg'] = '上传成功';
            $result['url'] = '/upload/' . $savePath . $info['savename'];
        } else {
            $result['msg'] = '上传失败，请上传小于3M的图片文件, ' . $upload->getError();
        }
        return $result;
    }
}