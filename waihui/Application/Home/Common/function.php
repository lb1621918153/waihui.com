<?php
/**
 * Created by PhpStorm.
 * User: ljw
 * Date: 2018/9/26
 * Time: 11:00
 */

class VerifyImage
{

    private $verifyCode;

    //生成随机字串
    private function createCode($type = 1, $length = 4)
    {
        if ($type == 1) {
            $verifyCode = implode('', range(0, 9));
        } elseif ($type == 2) {
            $verifyCode = implode('', array_merge(range('a', 'z'), range('A', 'Z')));
        } else {
            $verifyCode = implode('', array_merge(range('a', 'z'), range(0, 9), range('A', 'Z')));
        }

        //判断生成字符是否符合要求
        if (strlen($verifyCode) < $length) {
            return false;
        }
        //打乱字符串
        $verifyCode = str_shuffle($verifyCode);
        return substr($verifyCode, 0, $length);
    }

    //生成图片,并加入干扰线，干扰素
    public function createImage($type = 1, $length = 4, $width = 60, $height = 40)
    {
        $this->verifyCode = $this->createCode($type, $length);
        $image = imagecreatetruecolor($width, $height);

        //白色背景
        $white = imagecolorallocate($image, 255, 255, 255);
        //字体颜色
        $fontStyle = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));;
        imagefill($image, 0, 0, $white);
        imagestring($image, 14, 10, 10, $this->verifyCode, $fontStyle);
        //加入干扰点
        for ($i = 0; $i < 60; $i++) {
            $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
            imagesetpixel($image, rand(0, $width), rand(0, $height), $color);
        }
        //干扰线
        for ($i = 0; $i < 3; $i++) {
            $color = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));
            imageline($image, rand(0, $width), rand(0, $height), rand(0, $width), rand(0, $height), $color);
        }
        //输出图片
        header("Content-type: image/png");
        imagepng($image);
        //释放资源
        imagedestroy($image);
    }

    public function getVerifyCode() {
        return $this->verifyCode;
    }
}
