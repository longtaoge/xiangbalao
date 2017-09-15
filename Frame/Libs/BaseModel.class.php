<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 08:15:08
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-15 23:47:10
 */
namespace Frame\Libs;
use  Frame\Vendor\PDOWrapper;
abstract class BaseModel{

	private static $modelArray=array();
	//pdo
	protected $pdo=null;
	

	public function  __construct(){

		$this->pdo= new PDOWrapper();

	} 


	/**
	 * 根据类名获取类的实例
	 */
	public static function getInstance(){
		$modelName= get_called_class();
		if (!isset($modelArray[$modelName])) {
   			 self::$modelArray[$modelName]=new $modelName();
		}
		return self::$modelArray[$modelName];

	}


	/**
	 * [fetchAll 查询所有数据]
	 * @return [type] [description]
	 */
	public function fetchAll(){

		$page = isset($_REQUEST['page'])?$_REQUEST['page']:1;
 		$pageSize = isset($_REQUEST['pageSize'])?$_REQUEST['pageSize']:100;
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

 		return $data;
	}




	/**
	 * [fetchSomeIndex 根据指定规则查询]
	 * @param  string  $order    [description]
	 * @param  integer $page     [description]
	 * @param  integer $pageSize [description]
	 * @return [type]            [description]
	 */
  public function fetchSomeIndex($order='ASC' ,$page=1,$pageSize=10){   // DESC

 		$page=($page-1)*$pageSize;
		$sql ="select * from  $this->table  order by {$this->orderfield}  {$order} limit {$page},{$pageSize} ";
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

 		return $data;

 	}











	//TODO 
	protected function getPassword($str){
		$key = 'xiangblao';
		$pass=substr(sha1($str.$key), 0,20);
		$pass2=substr(sha1($str.$key), 20,40);
 		return $pass2.$pass;

	}






}