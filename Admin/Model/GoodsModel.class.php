<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 10:39:42
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-16 00:09:52
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
use Frame\Libs\FileTool;
use Frame\Libs\ImageTool;
final class GoodsModel extends BaseModel{

	protected $table='xb_goods';



	
 /** 
  * [upload 上传图片]
  * @return [type] [description]
  */
  public function upload(){

		$tool= new FileTool();
		$path= $tool->saveFile($_FILES['goods_Logo']);
		$imageTool =new ImageTool();
		$smallpath= $imageTool->cropImage($path,100,100);
		if ($path) {
			$data['status']=1;
 		    $data['msg']='上传成功';
 		    $data['path']=$path;
 		    $data['smallpath']=$smallpath;

		}else{
			$data['status']=0;
 		    $data['msg']='上传失败';
 		    $data['path']=$path;
 		
	   }

	   return $data;


  }

  	/**
  	 * [AddProduct 添加商品]
  	 */
	public function AddProduct(){

	$goods_name=isset($_POST['proName'])?$_POST['proName']:'';
   	$brand_id=isset($_POST['brandId'])?$_POST['brandId']:'';
   	$goods_oldPrice=isset($_POST['oldPrice'])?$_POST['oldPrice']:'';
   	$goods_price=isset($_POST['price'])?$_POST['price']:'';
   	$goods_num=isset($_POST['num'])?$_POST['num']:'';
   	$goods_weight=isset($_POST['size'])?$_POST['size']:'';
   	$proDesc=isset($_POST['proDesc'])?$_POST['proDesc']:'';
   	$goods_Logo=isset($_POST['goods_Logo'])?$_POST['goods_Logo']:'';
   	$goods_Logo_Small=isset($_POST['goods_Logo_Small'])?$_POST['goods_Logo_Small']:'';
   	$category_id=isset($_POST['category_id'])?$_POST['category_id']:1;
   	$bestday=isset($_POST['bestday'])?$_POST['bestday']:90;
   	$goods_place=isset($_POST['goods_place'])?$_POST['goods_place']:90;
   	// 查询分类ID 
   	$sql= "select category_id from xb_brand where brand_id ={$brand_id}";
   	$res=$this->pdo->fetchOne($sql) ;
   	if ($res) {
   	   $category_id= $res['category_id'];
   	}

   	$time =time();

   	$sql="insert into {$this->table} values(
   	null,
	{$category_id},
	{$brand_id},
	'{$goods_name}',
	{$goods_weight},
	{$goods_price},
	{$goods_oldPrice},
	'{$goods_Logo}',
	'{$goods_Logo_Small}',
	{$bestday},
	'{$goods_place}',
	'{$proDesc}',
	{$goods_num},
	{$time}
	)";

 	 $res=$this->pdo->fetchOne($sql) ;
  
    	if ($res) {
			$data['status']=1;
 		    $data['msg']='商品添加成功';
		}else{
			$data['status']=0;
 		    $data['msg']='商品添加失败';
	   }


	   return $data;


	}





}