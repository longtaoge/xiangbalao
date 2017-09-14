<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:10:25
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 21:23:51
 */
namespace Home\Controller;
use  Frame\Libs\BaseController;
use Home\Model\AccessModel;
use Home\Model\SuperModel;
class IndexController extends BaseController{

	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){
		//更新访问记录
		AccessModel::getInstance()->updateAccess();
		$datas=SuperModel::getInstance()->getIndex();
		$this->mSmarty->assign($datas);
    	$this->mSmarty->display(VIEW_PATH.'index.html');

	}

}