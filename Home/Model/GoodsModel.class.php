<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 11:05:40
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 18:03:36
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
final class GoodsModel extends BaseModel{

	protected $table='xb_goods';

 
 	public function fetchAllList($order='ASC',$page=1,$pageSize=10){   // DESC


 		$page=($page-1)*$pageSize;
		$sql ="select goods_id,goods_name, goods_price,goods_pic,goods_pic_thum from  $this->table  order by goods_add_time  {$order}  limit {$page},{$pageSize} ";
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
 	 * [getDetail 获取商品详情]
 	 * @return [type] [description]
 	 */
 	public function getDetail(){

 		$goods_id=isset($_REQUEST['goods_id'])?$_REQUEST['goods_id']:0;
 		 
 		$sql="select g.*, b.brand_name  from {$this->table} as g join xb_brand as b where goods_id ={$goods_id}  and g.brand_id = b.brand_id";


 		$res= $this->pdo->fetchOne($sql);
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

}