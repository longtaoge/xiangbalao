<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:10:25
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 19:28:00
 */
namespace Home\Controller;
use  Frame\Libs\BaseController;
class IndexController extends BaseController{


	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){

      $this->mSmarty->display(VIEW_PATH.'index.html');

	}

}