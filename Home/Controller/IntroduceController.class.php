<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:38:56
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 19:45:51
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class IntroduceController extends  BaseController{



	public function index (){

      $this->mSmarty->display(VIEW_PATH.'introduce.html');

	}


}