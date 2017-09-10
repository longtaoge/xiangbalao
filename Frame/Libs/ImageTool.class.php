<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-10 21:06:57
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-10 21:26:18
 */
namespace Frame\Libs;
final class ImageTool {


/**
 * 缩略图 
 * @return [type] [description]
 */
public function cropImage($path='',$des_w=100,$des_h=100,$replace=false){


	$finfo = finfo_open(FILEINFO_MIME_TYPE); // 返回 mime 类型
	$type=finfo_file($finfo, $path);
	finfo_close($finfo);

	switch ($type) {
		case image_type_to_mime_type(IMAGETYPE_GIF) :
			return $this->cropGif($path,$des_w,$des_h,$replace);
			break;
		case image_type_to_mime_type(IMAGETYPE_JPEG):
			return $this->cropJpeg($path,$des_w,$des_h,$replace);
			break;
		case image_type_to_mime_type(IMAGETYPE_PNG):
			return $this->cropPng($path,$des_w,$des_h,$replace);
			break;
		case image_type_to_mime_type(IMAGETYPE_BMP):
			return $this->cropBmp($path,$des_w,$des_h,$replace);
			break;
		default:
			 return $path;
			break;
	}



}



private function cropPng($path,$des_w,$des_h,$replace=false){
	//使用原图创建画布
	list($src_w,$src_h)=getimagesize($path);
 
	if ($src_w<$des_w&&$src<$src_h) {

		 return $path;

		}else{

		$ratio_w = $src_w/$des_w;
		$ratio_h= $src_h/$des_h;
		$radio=max($ratio_w,$ratio_h);
		$des_w=$src_w/$radio;
		$des_h=$src_h/$radio;

		$src_img=imagecreatefrompng($path);
		$des_img =imagecreatetruecolor($des_w, $des_h);
		imagecopyresampled(
			$des_img, $src_img,
			 0, 0, 
			 0, 0, 
			 $des_w, $des_h, 
			 $src_w, $src_h);
		header("content-type:image/png");
		//保存图像	
	  //修改文件名
	  $nameArray=str_split($path,strrpos($path,'.'));
	  if ($replace) {
		 $newPath = $path;
		}else{
		$newPath = $nameArray[0].'_'.ceil($des_w).'x'.ceil($des_h).$nameArray[1];
		}
	  imagepng($des_img,$newPath);

	return $newPath;

	}

}
private function cropBmp($path,$des_w,$des_h,$replace=false){
	//使用原图创建画布
	list($src_w,$src_h)=getimagesize($path);
 
	if ($src_w<$des_w&&$src<$src_h) {

		 return $path;

		}else{

		$ratio_w = $src_w/$des_w;
		$ratio_h= $src_h/$des_h;
		$radio=max($ratio_w,$ratio_h);
		$des_w=$src_w/$radio;
		$des_h=$src_h/$radio;

		$src_img=imagecreatefromwbmp($path);
		$des_img =imagecreatetruecolor($des_w, $des_h);
		imagecopyresampled(
			$des_img, $src_img,
			 0, 0, 
			 0, 0, 
			 $des_w, $des_h, 
			 $src_w, $src_h);
		header("content-type:image/bmp");
		//保存图像	
	  //修改文件名
	  $nameArray=str_split($path,strrpos($path,'.'));
		if ($replace) {
			 $newPath = $path;
		}else{
		 $newPath = $nameArray[0].'_'.ceil($des_w).'x'.ceil($des_h).$nameArray[1];
		}
	  imagewbmp($des_img,$newPath);

	return $newPath;

	}

}

private function cropGif($path,$des_w,$des_h,$replace=false){
	//使用原图创建画布
	list($src_w,$src_h)=getimagesize($path);
 
	if ($src_w<$des_w&&$src<$src_h) {
		 return $path;
		}else{
		$ratio_w = $src_w/$des_w;
		$ratio_h= $src_h/$des_h;
		$radio=max($ratio_w,$ratio_h);
		$des_w=$src_w/$radio;
		$des_h=$src_h/$radio;

		$src_img=imagecreatefromgif($path);
		$des_img =imagecreatetruecolor($des_w, $des_h);
		imagecopyresampled(
			$des_img, $src_img,
			 0, 0, 
			 0, 0, 
			 $des_w, $des_h, 
			 $src_w, $src_h);
		header("content-type:image/gif");
		//保存图像	
	  //修改文件名
	  $nameArray=str_split($path,strrpos($path,'.'));
	 if ($replace) {
		 $newPath = $path;
	}else{
		 $newPath = $nameArray[0].'_'.ceil($des_w).'x'.ceil($des_h).$nameArray[1];
	}
	  imagegif($des_img,$newPath);

	return $newPath;

	}

}





private function cropJpeg($path,$des_w,$des_h,$replace=false){

		//使用原图创建画布
	list($src_w,$src_h)=getimagesize($path);
	if ($src_w<$des_w&&$src<$src_h) {
		return $path; 
	}else{

	$ratio_w = $src_w/$des_w;
	$ratio_h= $src_h/$des_h;
	$radio=max($ratio_w,$ratio_h);
	$des_w=$src_w/$radio;
	$des_h=$src_h/$radio;

	$src_img=imagecreatefromjpeg($path);
	$des_img =imagecreatetruecolor($des_w, $des_h);
	imagecopyresampled(
		$des_img, $src_img,
		 0, 0, 
		 0, 0, 
		 $des_w, $des_h, 
		 $src_w, $src_h);
	header("content-type:image/jpeg");
	$nameArray=str_split($path,strrpos($path,'.'));

	if ($replace) {
		 $newPath = $path;
	}else{
		 $newPath = $nameArray[0].'_'.ceil($des_w).'x'.ceil($des_h).$nameArray[1];
	}
   
	//保存图像
	imagejpeg($des_img,$newPath);

	return $newPath;

	}




}



}