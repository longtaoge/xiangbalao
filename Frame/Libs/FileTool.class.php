<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-10 10:03:48
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-10 21:15:27
 */
namespace Frame\Libs;
final class FileTool {
	/**
	 * [saveFile  保存文件]
	 * @param  [type]  $file       [description]
	 * @param  array   $type_array [description]
	 * @param  integer $max_size   [description]
	 * @param  [type]  $dir        [description]
	 * @return [type]              [description]
	 */
 function saveFile($file,$type_array=[],$max_size=0,$dir=null){
		 //较验非空
		if (empty($file)) {
			return null;
			 die('文件为空!');
		}
		 //设置默最大上传文件
		if ($max_size==0) {
			$max_size = 1024*1024*8;
		}
		//默认上伟目录
		if ($dir==null) {
			$dir='./Public/upload/';
		}
		//默认支持类型
		if (empty($type_array)) {
			$type_array=['image/png','image/gif','image/jpeg','text/html','text/css','text/javascript','text/plain'];
		}
		//转换变量
		foreach ($file as $key => $value) {
			$$key=$value;
		}
		//较验文件长度
		if ($file['size']>$max_size) {
			return null;
			 die('文件过大');
		}

		//计读取文件信息  
		$fileinfo= finfo_open(FILEINFO_MIME_TYPE);
		
		//判断文件信息是否合法 
		if (!in_array(finfo_file($fileinfo, $tmp_name), $type_array)) {
			return null;
			 die('非法文件类型');
		}

		 //较验临时文件是否存在
		if (is_uploaded_file($tmp_name)){
			 
			/**
			 * TODO 文件命名规则
			 *$final_name=$dir.md5(time()).$name;
			 * $final_name=$dir.time().$name;
			 * $final_name=$dir.mt_rand(1,999).$name;
			 * $final_name=  substr(strrchr($name, '\\'),1);
			 * 
			 */
			//$final_name= $dir.uniqid().$name;
			$final_name=$dir.date('YmdH-i-s').$name;

		 
			if (move_uploaded_file($tmp_name, $final_name)) {
				 return $final_name;
				// echo('文件上传成功:'.$final_name);
			}else{
				 return null;
				 //echo('文件名非法,上传失败!');
			}

		}
		 
		
}



/**
 * [saveMultfile 保存多文件上传]
 * @param  [type]  $files      [description]
 * @param  array   $dir        [description]
 * @param  integer $maxSize    [description]
 * @param  array   $type_array [description]
 * @return [type]              [description]
 */
function saveMultfile($files,$dir=[],$maxSize=0,$type_array=[]){

		$fill_dir=[];

		if (empty($dir)) {
			$dir='./upload/';
		}

		if ($maxSize<=0) {
		   $maxSize=1024*1024*8;
		}

		if (empty($type_array)) {

			$type_array=['image/png','image/gif','image/jpeg','text/html','text/css','text/javascript','text/plain'];
		}


	foreach ($files['error'] as$key  => $value) {
		//较验错误码
	   if ($value!=0) {
	     echo ('文件传输错误!');
	     continue;
	   }
	  //处理文件名
	    $finalFile=$dir.date('YmdH-i-s').$files['name'][$key];

	   if ($files['size'][$key]>$maxSize) {

	   	 echo ("文件太大,$maxSize 上失败!");

	   }else{
		   //如果临时文件存在
		  if (is_uploaded_file($files['tmp_name'][$key])) {
		    //计读取文件信息  
		    $fileInfo=finfo_open(FILEINFO_MIME_TYPE);
		   //判断文件类型是否合法
		    if (!in_array(finfo_file($fileInfo, $files['tmp_name'][$key]),$type_array)){
		  	  die('非法文件类型');
		    }
		     //保存文件
		      move_uploaded_file($files['tmp_name'][$key],$finalFile);
		     $fill_dir[]=$finalFile;
		  }
	   }
	 
	}


	return $fill_dir;
}






}