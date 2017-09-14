<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:38:56
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 21:31:27
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class IntroduceController extends  BaseController{



	public function index (){
	  $datas=SuperModel::getInstance()->getIntroduce();
	  $this->mSmarty->assign($datas);
      $this->mSmarty->display(VIEW_PATH.'introduce.html');

	}


}