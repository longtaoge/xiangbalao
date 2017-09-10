<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-09 21:05:44
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-09 23:21:44
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
final class CategoryController extends BaseController{

	protected $table='xb_category';



	/** 
	 * 获取产品分类 
	 */
	public function CategoryList(){

 		$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
 		$pageSize = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:5;
 		$page=($page-1)*$pageSize;
		$sql ="select * from  $this->table limit {$page},{$pageSize} ";
		$res= $this->pdo->fetchAll($sql);
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
	 * 添加分类
	 * @return [type] [description]
	 */
	public function categoryAdd(){


		 if (isset($_POST['categoryName'])) {
		 		$categoryName = $_POST['categoryName'];

		 		$sql = " insert into {$this->table} values(null,'{$categoryName}',1) ";
		 		$res = $this->pdo->exec($sql);
		 		if ($res) {
		 			$data['status']=1;
 		    		$data['msg']='查询成功';
		 		}else{
		 			$data['status']=0;
 		    		$data['msg']='查询成功';
		 		}

		 		echo json_encode($data);
		 	 
		 }else{

			$this->mSmarty->display(VIEW_PATH.'category_add.html');
		 	
		 }





	}

	
 





}