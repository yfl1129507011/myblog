<?php
/**
 * filename checkcode.class.php
 * description: 验证码生成类
 */
defined('IN_MYPC') or exit('No permission resourse.');
//获取session存储方式
$session_storage = 'session_' . mp_base::load_config('system', 'session_storage');
mp_base::load_sys_class($session_storage);

class checkcode {
	//验证码中使用的字符，01IO容易混淆，建议不使用
    private $charset = '23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW';
    private $code = '';         //验证码
    private $codelen = 4;       //验证码长度
    private $imageW = 81;       //验证码图片宽度
    private $imageH = 33;       //验证码图片高度
    private $img = null;        //验证码图片句柄
    private $font = '';         //验证码字体格式
    private $fontsize = 20;     //字体大小
    private $fontcolor = '';    //字体颜色
    private $flag = 'vcode';    //存放在session中的标识号
    
    public function __construct(){
        $this->font = 'font.ttf';
        //@session_start();
    }
    
    /**
     * 生成验证码随机码
     */
    private function createCode(){
        $_len = strlen($this->charset) - 1;
        for ($i=0; $i<$this->codelen; $i++){
            $this->code .= $this->charset[mt_rand(0,$_len)];
        }
    }
    
    
    /**
     * 生成验证码背景
     */
    private function createBg(){
        $this->img = imagecreatetruecolor($this->imageW, $this->imageH);  //新建一个真彩色图像
        $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));  //为一幅图像分配颜色
        imagefilledrectangle($this->img, 0, $this->imageH, $this->imageW, 0, $color);  //画一矩形并填充
    }
    
    
    /**
     * 生成文字
     */
    private function createFont(){
        $_x = $this->imageW / $this->codelen;
        for ($i=0; $i<$this->codelen; $i++){
            $this->fontcolor = imagecolorallocate($this->img, mt_rand(0,156), mt_rand(0,156), mt_rand(0,156));
            imagettftext($this->img, $this->fontsize, mt_rand(-30, 30), $_x*$i+mt_rand(1,5), $this->imageH / 1.4, $this->fontcolor, $this->font, $this->code[$i]);  //用 TrueType 字体向图像写入文本
        }
    }
    
    
    /**
     * 生成线条，雪花
     */
    private function createLine(){
        //生成线条
        for ($i=0; $i<6; $i++){
            $color = imagecolorallocate($this->img, mt_rand(0,156), mt_rand(0,156), mt_rand(0,156));
            imageline($this->img, mt_rand(0,$this->imageW), mt_rand(0, $this->imageH), mt_rand(0,$this->imageW), mt_rand(0, $this->imageH), $color);
        }
        //生成雪花
        for ($i=0; $i<100; $i++){
            $color = imagecolorallocate($this->img, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
            imagestring($this->img, mt_rand(1,5), mt_rand(0,$this->imageW), mt_rand(0,$this->imageH), '*', $color);
        }
    }
    
    
    /**
     * 输出验证码图片
     */
    private function outputImg(){
        header('Content-type:image/png');
        imagepng($this->img);  //以 PNG 格式将图像输出到浏览器或文件
        imagedestroy($this->img);  //销毁一图像
    }
    
    
    /**
     * 生成验证码图片
     */
    public function createImg(){
        $this->createBg();
        $this->createCode();
        $this->createLine();
        $this->createFont();
        $this->outputImg();
        $_SESSION[$this->flag] = strtolower($this->code);   //将验证随机码存入session中
    }
    
}

$verify = new checkcode();
$verify->createImg();