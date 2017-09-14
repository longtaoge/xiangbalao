<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 08:24:09
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-12 08:43:36
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
final class IndexModel extends BaseModel {



	/** 
	 * [fetchMix 综合查询]
	 * @return [type] [description]
	 */
	public  function fetchMix(){

			   $sql='SELECT * from xb_access ';
				$res=$this->pdo->fetchOne($sql);
					if($res){
						$data['lastIp'] =$res['lastIp'];
						$data['assess_count'] =$res['assess_count'];
						$data['lastTime'] = date('Y-m-d', $res['lastTime']) ;
					}
				$sql='select count(*) from xb_category';
				$res=$this->pdo->fetchOne($sql); 
				if ($res) {
					  $data['category']=$res['count(*)']; 
				}

 				$sql='select count(*) from xb_brand';
				$res=$this->pdo->fetchOne($sql); 
				if ($res) {
					  $data['brand']=$res['count(*)']; 
				}

 				$sql='select sum(goods_num) from xb_goods';
				$res=$this->pdo->fetchOne($sql); 
				if ($res) {
			      $data['goods']=$res['sum(goods_num)']; 
				}

				$sql ='select goods_name,goods_num from xb_goods group by goods_name ';
				$res=$this->pdo->fetchAll($sql); 
				$goods_name=[];
				$goods_num=[];
				if ($res) {
					foreach ($res as $key => $value) {
						$goods_name[]=$value['goods_name'];
						$goods_num[]=$value['goods_num'];
					}
					

				}
  				$data['goods_name']=$goods_name;
  				$data['goods_num']=$goods_num;
				return $data;

	}


}