<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 08:37:58
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 11:01:32
 */
namespace Frame\Vendor;
final class Captcha{ 
	private $code ;//验证码
	private $codelen; //验证码长度
	private $width; // 验证码宽度
  	private $height; //验证码高度
  	private $fontSize; //验证码字号
  	private $fontfile; //验证码字体文件
  	private $img;  //图片对象


  	public function __construct($codelen=4,$width=85,$height=30,$fontSize=16){
  		$this->codelen=$codelen;
  		$this->width=$width;
  		$this->height=$height;
  		$this->fontSize=$fontSize;
  		$this->fontfile='./Public/Admin/Images/MSYH.TTC';
  		$this->createCode();//生成验证码了字符串
  		$this->createBg(); //生成背景矩形
  		$this->createFont();//写入字符集
  		$this->output();//输出图像



  	}


  	/**
  	 * 生成验证码
  	 * @return [type] [description]
  	 */
  	private function createCode(){
  		$arrList=array_merge(range('a', 'z'),range('A', 'Z'),range(0, 9));
  		shuffle($arrList);
  		shuffle($arrList);
  		$arr_index=array_rand($arrList,4);

  		foreach ($arr_index as $i) {
  			 $str.=$arrList[$i];
  		}

  		$this->code=$str;


  	}


  	/**
  	 * 创建画布
  	 * @return [type] [description]
  	 */
  	private function createBg(){
  		//背景颜色
  		$color =imagecolorallocate($this->img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
  		imagefilledrectangle($this->img, 0, 0, $this->width, $this->height, $color);
  	}

  	/**
  	 * 创建文本
  	 * @return [type] [description]
  	 */
  	private function createFont(){
  	//验证码颜色
   $color =imagecolorallocate($this->img, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
	imagettftext($this->img, $this->fontSize, mt_rand(0,0), 20, 25, $color, $this->fontfile, $this->code);

  	}

  	/**
  	 * 输出验证码
  	 * @return [type] [description]
  	 */
  	private function output(){
  		header("content-type:image/png");
  		imagepng($this->img);
  		imagedestroy($this->img);

  	}


  	/**
  	 * 返回验证码
  	 * @return [type] [description]
  	 */
  	public function getCode(){

  		return strtolower($this->code);
  	}



}