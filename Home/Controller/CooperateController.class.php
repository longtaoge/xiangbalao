<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 09:23:41
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 16:59:06
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class CooperateController extends BaseController{



	public function index(){

		$datas=SuperModel::getInstance()->getCooperate();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'cooperate.html');
	}

}