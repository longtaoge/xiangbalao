<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:20:07
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 17:10:43
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class MapController extends BaseController{



	public function index(){
		$datas=SuperModel::getInstance()->getMap();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'map.html');
	}


	
}