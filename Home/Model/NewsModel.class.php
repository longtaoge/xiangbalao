<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 19:51:59
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 16:11:24
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
final class NewsModel extends BaseModel{
  protected $table='xb_news';
  protected $orderfield ='news_id';

	/**
	 * [fetchSomeIndex 根据指定规则查询]
	 * @param  string  $order    [description]
	 * @param  integer $page     [description]
	 * @param  integer $pageSize [description]
	 * @return [type]            [description]
	 */
  public function fetchSomeIndex($order='ASC' ,$page=1,$pageSize=10){   // DESC
  		$type =isset($_REQUEST['type'])?$_REQUEST['type']:0;
  		$where=1;
  		if ($type>0) {
  			 $where=" type={$type}";
  		}
  		 
 		$page=($page-1)*$pageSize;
		$sql ="select news_id, title ,type from  $this->table  where {$where} order by  {$this->orderfield} {$order} limit {$page},{$pageSize} ";
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
 	 * [getDetail 获取新闻详情]
 	 * @return [type] [description]
 	 */
 	public function getDetail(){

 	    $news_id =isset($_REQUEST['news_id'])?$_REQUEST['news_id']:0;
		$sql ="select * from  $this->table  where news_id = {$news_id} ";
		$res= $this->pdo->fetchOne($sql);
		if ($res) {	
				$data['status']=1;
 		    	$data['msg']='查询成功';
 		    	$data['news']=$res;
		}else{
 				$data['status']=0;
 		    	$data['msg']='查询失败';
 		    	
 		    }

 		return $data;

 	}




}