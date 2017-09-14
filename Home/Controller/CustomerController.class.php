<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:12:47
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 17:05:13
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class CustomerController extends BaseController{



	public function index (){

		$datas=SuperModel::getInstance()->getCustomer();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'customer.html');

	}



}