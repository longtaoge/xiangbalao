<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:50:31
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 17:31:45
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class CategoryController extends BaseController{


	public function index(){
		$datas=SuperModel::getInstance()->getCategory();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'category.html');
	}


	public function detail(){


		 

		$datas=SuperModel::getInstance()->getProduct();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'product_detail.html');



	}

}