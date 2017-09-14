<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-11 21:07:18
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 09:54:18
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\PhotoModel;
final class PhotoController extends BaseController{
	

 	public function index(){
 		$this->denyAccess();
 		$this->mSmarty->display(VIEW_PATH.'photo_list.html');

 	}

 	/**
 	 * [photoAdd 添加图片]
 	 * @return [type] [description]
 	 */
 	public function photoAdd(){
 	   if (isset($_POST['proName'])) {
		   $model=  PhotoModel::getInstance();
		   $data=$model->photoAdd();
		   echo json_encode($data);
 		}else{
 		    $this->mSmarty->display(VIEW_PATH.'photo_add.html');
 		}
 	}

 	/**
 	 * 上传图片
 	 * @return [type] [description]
 	 */
 	public function photoUpload(){
 		$model=  PhotoModel::getInstance();
 		$data=$model->upload();  
	    echo json_encode($data);
 	}


 	/**
 	 * 查询所有图片
 	 * @return [type] [description]
 	 */
 	public function photoQuery(){
 		$model=  PhotoModel::getInstance();
 		$data=$model->fetchAll();  
 		echo json_encode($data);

 	}



 	public function deletePhoto(){

		$model=  PhotoModel::getInstance();
 		$data=$model->deletePhoto();  
 		echo json_encode($data);

 	}


}