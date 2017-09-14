<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 20:03:39
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 20:42:53
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
final class PhotoModel extends BaseModel {

  protected $table ='xb_photo';
  protected $orderfield ='photo_id';



  public function getPhotoGroup(){

     $sql="select  *  ,sum(goods_id) as sum from {$this->table}  group by goods_id ";
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
   * [getPhotosByCategory 获取分类图片]
   * @return [type] [description]
   */
  public function getPhotosByCategory(){

  	$category_id=isset($_REQUEST['id'])?$_REQUEST['id']:0;
    
  	 $sql=" select  *  from {$this->table}  where 1  ";
     if ($category_id>0) {
         $sql .= "  and  category_id = {$category_id}";
     }
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
 * 获取商品图片
 */
public function getPhotosByGoods(){

     $goods_id=isset($_REQUEST['goods_id'])?$_REQUEST['goods_id']:0;
     $sql=" select  *  from {$this->table}  where goods_id = {$goods_id}  ";
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




}