<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:50:31
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 19:58:20
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class CategoryController extends BaseController{


	public function index(){

		$this->mSmarty->display(VIEW_PATH.'category.html');
	}

}