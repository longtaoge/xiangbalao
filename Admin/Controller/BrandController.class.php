<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-09 23:49:35
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-10 21:48:54
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Frame\Libs\FileTool;
use Frame\Libs\ImageTool;
final class BrandController extends BaseController{


	protected $table='xb_brand';



  /**
     * 
     * @return [品牌页] [description]
     */
    public function brand(){
    	$this->mSmarty->display(VIEW_PATH.'brand.html');
    }





	/**
	 * [品牌列表]
	 * @return [type] [description]
	 */
	public function brandList(){

 	$page=isset($_GET['page'])?$_GET['page']:1;
 	$pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:10;
 	$page= ($page-1)*$pageSize;
  	$sql ="select  * from  $this->table limit  {$page} ,{$pageSize}" ;
  	$res=$this->pdo->fetchAll($sql);

  	  if ($res) {
  		 		$data['status']=1;
 		    	$data['msg']='查询成功';
 		    	$data['rows']=$res;
  		}else{
				$data['status']=0;
 		    	$data['msg']='查询失败';
 		    	$data['rows']=[];

  	}
	echo json_encode($data);

	}


	/**
	 * [添加品牌]
	 * @return [type] [description]
	 */
	public function brandAdd(){

		if (isset($_POST['categoryId'])) {

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
	    echo json_encode($data);


	}




}