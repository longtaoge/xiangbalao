<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 10:16:03
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 14:09:14
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
use Frame\Libs\FileTool;
use Frame\Libs\ImageTool;
final class BrandModel extends BaseModel {

	protected $table='xb_brand';

	/**
	 * [brandAdd 添加]
	 * @return [type] [description]
	 */
	public function brandAdd(){

		   $brandName =$_POST['brandName'];
			$categoryId =$_POST['categoryId'];
			$brandLogo =$_POST['brandLogo'];
			$hot =$_POST['hot'];

			$sql ="insert into {$this->table} values (null, {$categoryId},'{$brandName}','{$brandLogo}',{$hot},1)";
			$res=$this->pdo->exec($sql);

			if ($res) {
				$data['status']=1;
 		    	$data['msg']='添加成功';
			}else{
				$data['status']=0;
 		    	$data['msg']='失败成功';
			}

		return $data;
	}


	/**
	 * [brandPicAdd 上传图片]
	 * @return [type] [description]
	 */
	public function brandPicAdd(){

 		$tool= new FileTool();
		$path= $tool->saveFile($_FILES['brandLogo']);
		$imageTool =new ImageTool();
		$path= $imageTool->cropImage($path,100,100,true);

		if ($path) {
			$data['status']=1;
 		    $data['msg']='上传成功';
 		    $data['path']=$path;
		}else{
			$data['status']=0;
 		    $data['msg']='上传失败';
 		    $data['path']=$path;
		  
	   }

	   return $data;

	}



}