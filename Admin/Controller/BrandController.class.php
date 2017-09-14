<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-09 23:49:35
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:37:21
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\BrandModel;
final class BrandController extends BaseController{


  /**
     * 
     * @return [品牌页] [description]
     */
    public function index(){
    	$this->denyAccess();
    	$this->mSmarty->display(VIEW_PATH.'brand.html');
    }


	/**
	 * [品牌列表]
	 * @return [type] [description]
	 */
	public function brandList(){
	$model=   BrandModel::getInstance();
	$data=$model->fetchAll();
	echo json_encode($data);

	}


	/**
	 * [添加品牌]
	 * @return [type] [description]
	 */
	public function brandAdd(){

		if (isset($_POST['categoryId'])) {
			$model=   BrandModel::getInstance();
			$data=$model->brandAdd();
			echo json_encode($data);
		}else{
			$this->mSmarty->display(VIEW_PATH.'brand_add.html');
		}
	}


	/** 
	 * 图片上传
	 * @return [type] [description]
	 */
	public function brandPicAdd(){
		$model=   BrandModel::getInstance();
		$data=$model->brandPicAdd();
	    echo json_encode($data);

	}




}