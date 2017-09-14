<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 08:18:56
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 10:46:36
 */
namespace Frame\Libs;
use Frame\Vendor\Smarty;
use Frame\Vendor\PDOWrapper;
abstract class BaseController{

	protected $mSmarty=NUll;
	protected $pdo=null;
	protected $table=null;

	function __construct(){
		$mSmarty=new Smarty();
		$mSmarty->left_delimiter="<{";
		$mSmarty->right_delimiter="}>";
		$mSmarty->setTempLateDir(VIEW_PATH);
		//PHP 操作系统的临时目录
		$mSmarty->setCompileDir(sys_get_temp_dir().DS.'view_c'.DS);
		$this->mSmarty=$mSmarty;
		$this->pdo= new PDOWrapper();
	}

	

	
	protected function getPassword($str){

		$key = 'xiangblao';
		$pass=substr(sha1($str.$key), 0,20);
		$pass2=substr(sha1($str.$key), 20,40);
 		return $pass2.$pass;

		}

	//登录状态较验
	protected function  denyAccess(){

	 	if (empty($_SESSION['username'])) {
	 		$this->emptyPage('拒绝访问','请登录后操作');
	 		header("refresh:1;url=?c=User");
	 		die();
	 	}

	}

	/**
	 * [emptyPage 404]
	 * @return [type] [description]
	 */
	 public function emptyPage($title='无法访问',$msg='相关页面无法找到'){

	 	$this->mSmarty->assign("title",$title);
	 	$this->mSmarty->assign("message",$msg);
     	$this->mSmarty->display(VIEW_PATH.'404.html');
     }

}