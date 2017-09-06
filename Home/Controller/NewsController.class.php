<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:06:30
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 20:08:39
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class NewsController extends BaseController{

	public function index(){

		$this->mSmarty->display(VIEW_PATH.'news.html');


	}



}