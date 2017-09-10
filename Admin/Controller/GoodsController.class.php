<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-10 21:57:26
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-10 23:27:26
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
final class GoodsController extends BaseController{

	protected $table='xb_category';

   public function index(){

   }


   public function goodsList(){

		$page=isset($_GET['page'])?$_GET['page']:1;
 		$pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:10;
 		$page= ($page-1)*$pageSize;

   		$sql ="select * from  $this->table limit {$page},{$pageSize} ";
		$res= $this->pdo->fetchAll($sql);
		if ($res) {			 
				$data['status']=1;
 		    	$data['msg']='查询成功';
 		    	$data['rows']=$res;
		}else{
 				$data['status']=0;
 		    	$data['msg']='查询失败';
 		    	$data['rows']=[ ];
 		    }
 		echo json_encode($data);	


   }




}