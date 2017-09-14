<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-09 21:05:44
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:38:46
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\CategoryModel;
final class CategoryController extends BaseController{

	
	/**
	 * 分类页
	 * @return [type] [description]
	 */
	public function index(){
		$this->denyAccess();
		$this->mSmarty->display(VIEW_PATH.'category.html');
	}

	/** 
	 * 获取产品分类 
	 */
	public function CategoryList(){
		$model=  CategoryModel::getInstance();
		$data=$model->fetchAll();
 		echo json_encode($data);		

	}


	/** 
	 * 添加分类
	 * @return [type] [description]
	 */
	public function categoryAdd(){

		 if (isset($_POST['categoryName'])) {
		 	$model= CategoryModel::getInstance();
			$data=$model->categoryAdd();
		 	echo json_encode($data);
		 	 
		 }else{

			$this->mSmarty->display(VIEW_PATH.'category_add.html');
		 	
		 }

	}

	
 





}