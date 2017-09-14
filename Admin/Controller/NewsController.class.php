<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 21:47:39
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:39:26
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\NewsModel;
final class NewsController extends BaseController{



	 public  function index(){
	 	$this->denyAccess();
	 	 $this->mSmarty->display(VIEW_PATH.'news_list.html');

	 }


	 public function newsAdd(){
	  	if (isset($_POST['type'])) {
	  	   $model=  NewsModel::getInstance();
	 	   $data= $model->newsAdd();
		   echo json_encode($data);
	  	}else{
		   $this->mSmarty->display(VIEW_PATH.'news_add.html');
	  	}
	 }


	 public function newsQuery(){
 		   $model=  NewsModel::getInstance();
	 	   $data= $model->fetchAll();
		   echo json_encode($data);

	 }




}