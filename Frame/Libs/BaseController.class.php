<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 08:18:56
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 19:24:15
 */
namespace Frame\Libs;
use Frame\Vendor\Smarty;
abstract class BaseController{

	protected $mSmarty=NUll;

	function __construct(){
		$mSmarty=new Smarty();
		$mSmarty->left_delimiter="<{";
		$mSmarty->right_delimiter="<{";
		$mSmarty->setTempLateDir(VIEW_PATH);
		//PHP 操作系统的临时目录
		$mSmarty->setCompileDir(sys_get_temp_dir().DS.'view_c'.DS);
		$this->mSmarty=$mSmarty;
		
	}

	

	


}