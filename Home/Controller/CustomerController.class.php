<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:12:47
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 20:15:29
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class CustomerController extends BaseController{



	public function index (){

		$this->mSmarty->display(VIEW_PATH.'customer.html');

	}



}