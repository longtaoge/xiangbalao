<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:20:07
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 20:22:06
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class MapController extends BaseController{



	public function index(){
		$this->mSmarty->display(VIEW_PATH.'map.html');
	}


	
}