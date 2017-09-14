<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 11:45:52
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 10:16:26
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
use Frame\Libs\FileTool;
use Frame\Libs\ImageTool;
final class PhotoModel extends BaseModel {

   protected $table='xb_photo';


 


   /**
    * [photoAdd 添加图片]
    * @return [type] [description]
    */
   public function photoAdd(){

	    $photo=$_POST['photo'];
		  $photosmall=$_POST['photosmall'];
		  $proName=$_POST['proName'];
		  $goodsId=$_POST['goodsId'];
		  $category_id=0;
		  $brand_id=0;

		  $sql ="select category_id,brand_id from  xb_goods	where goods_id = {$goodsId}" ;

		  $res= $this->pdo->fetchOne($sql);
		  if ($res) {
		  	$category_id=$res['category_id'];
		  	$brand_id=$res['brand_id'];
		  }

		  $sql ="insert into {$this->table} values (null,'{$photo}','{$photosmall}', '{$proName}',$goodsId,$brand_id,$category_id,null)";

		  $res=$this->pdo->exec($sql);

		  if ($res) {
		  	    $data['status']=1;
	 		    $data['msg']='上传成功';
	 		   
		  }else{
		       $data['status']=0;
	 		    $data['msg']='上传失败';
	 		   
	 		   
		  }

		  return $data;

}




/**
 * [upload 图片上传]
 * @return [type] [description]
 */
 public function upload(){
  			$data['status']=0;
 		    $data['msg']='上传失败';
 		    $data['path']='';
 		if (isset($_FILES['photo'])) {
 			$tool= new FileTool();
			$path= $tool->saveFile($_FILES['photo']);
			$imageTool =new ImageTool();
			$smallpath= $imageTool->cropImage($path,300,200);
			if ($path) {
				$data['status']=1;
	 		    $data['msg']='上传成功';
	 		    $data['path']=$path;
	 		    $data['smallpath']=$smallpath;

			} 
 		}


 		return $data;
 }



	public function deletePhoto(){

			$data['status']=0;
 		    $data['msg']='删除失败';
 		    $id=isset($_GET['id'])?$_GET['id']:-1;
 	
 		    $sql =" delete from {$this->table} where photo_id = {$id}";
		    $res=$this->pdo->exec($sql);
			if ($res) {
				$data['status']=1;
	 		    $data['msg']='删除成功';
	 		  

			} 
 		 


 		return $data;

	}



}