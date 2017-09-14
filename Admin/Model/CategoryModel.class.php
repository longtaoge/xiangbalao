<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 10:01:38
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 14:06:08
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
final class CategoryModel extends BaseModel{
	protected $table='xb_category';


	

	/** 
	 * [categoryAdd 添加分类]
	 * @return [type] [description]
	 */
	public  function categoryAdd(){

				$categoryName = $_POST['categoryName'];

		 		$sql = " insert into {$this->table} values(null,'{$categoryName}',1) ";
		 		$res = $this->pdo->exec($sql);
		 		if ($res) {
		 			$data['status']=1;
 		    		$data['msg']='添加成功';
		 		}else{
		 			$data['status']=0;
 		    		$data['msg']='添加失败';
		 		}

		 		
		 		return $data;

	}



}