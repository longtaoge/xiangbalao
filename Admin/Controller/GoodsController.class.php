<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-10 21:57:26
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:39:08
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\GoodsModel;

final class GoodsController extends BaseController{

	

   public function index(){
    $this->denyAccess();
   	$this->mSmarty->display(VIEW_PATH.'goods_list.html');

   }

   /**
    * [goodsList description]
    * @return [type] [description]
    */
   public function goodsList(){
    $model= GoodsModel::getInstance();
    $data= $model->fetchAll();
 		echo json_encode($data);	


   }



    /**
     * [goods_add 上传商品图片]
     * @return [type] [description]
     */
   public function goodsAdd (){

   	if (isset($_FILES['goods_Logo'])) {
        $model=  GoodsModel::getInstance();
        $data= $model->upload();
	      echo json_encode($data);

   	}else{

		   $this->mSmarty->display(VIEW_PATH.'goods_add.html'); 

   	}


   }


   /**
    * 添加商品
    */

   public function goodsAddProduct(){
      $model=  GoodsModel::getInstance();
   	  $data=$model->AddProduct();
	    echo json_encode($data);
 
   }
   






}