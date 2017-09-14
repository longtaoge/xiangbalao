<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 23:13:05
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 14:11:31
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
final class NewsModel extends BaseModel{

	protected $table='xb_news';



 


 	/**
 	 * [newsAdd 添加新闻]
 	 * @return [type] [description]
 	 */
 	public function newsAdd(){

 		$title =isset($_POST['title'])?$_POST['title']:'';
 		$type =isset($_POST['type'])?$_POST['type']:1;
 		$author =isset($_POST['author'])?$_POST['author']:'';
 		$source =isset($_POST['source'])?$_POST['source']:'';
 		$content =isset($_POST['content'])?$_POST['content']:'';
 		$time= time();
 		$sql= "insert into  {$this->table} values(null,'{$title}','{$content}',{$type},'{$author}','{$source}',{$time})";
		$res= $this->pdo->exec($sql);
		if ($res) {			 
				$data['status']=1;
 		    	$data['msg']='添加成功';
 		    	$data['rows']=$res;
		}else{
 				$data['status']=0;
 		    	$data['msg']='添加失败';
 		    	$data['rows']=[];
 		    }

 		return $data;



 	}



}