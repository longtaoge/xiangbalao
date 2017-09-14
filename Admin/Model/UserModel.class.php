<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-12 08:44:50
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-12 09:52:39
 */
namespace Admin\Model;
use Frame\Libs\BaseModel;
final class UserModel extends BaseModel{

		protected $table='xb_user';


	/**
	 * [login 登录]
	 * @return [type] [description]
	 */
	public function login(){

			$password= $_POST["password"];
			$username= $_POST["username"];
			$password=$this->getPassword($password);
			$sql="Select * from $this->table  where username ='{$username}' and  password ='{$password}'" ;
 		    $res= $this->pdo->fetchOne($sql);
 		    if ($res) {
 		    	$_SESSION['username']=$res['username'];
 		    	$_SESSION['userid']=$res['id'];
 		    	 $data['status']=1;
 		    	 $data['msg']='登录成功';
 		    	 $time =time();
 		    	 $ip=$_SERVER["REMOTE_ADDR"];
 		    	 $sql ="update xb_user  set lastTime='{$time}', lastIp='{$ip}' where id ={$res['id']}";
 		    	 
 		    	 $this->pdo->exec($sql);

 		    }else{

 				$data['status']=0;
 		    	$data['msg']='登录失败';

 		    }

 		   
 		    return $data;
	}






		/**
		 * [addUser 添加用户]
		 */
    public function addUser(){

		$username=isset($_POST['userName'])?$_POST['userName']:'';
 		$nickName=isset($_POST['nickName'])?$_POST['nickName']:'';
 		$password=isset($_POST['password'])?$_POST['password']:'';
 		$password=$this->getPassword($password);
 		$phone=isset($_POST['phone'])?$_POST['phone']:'';
 		$role=isset($_POST['role'])?$_POST['role']:0;
 		$time =time();
 		$ip=$_SERVER["REMOTE_ADDR"];
 		//执行SQL 
 		$sql="insert into {$this->table} values(null,'{$username}','{$password}',{$time},'{$ip}','{$nickName}',{$role},{$phone})" ;

        $res=$this->pdo->exec($sql);
 	
        if($res){
 		 	  $data['status']=1;
 		      $data['msg']='添加用户成功';
 		 }else{
 		 	 $data['status']=0;
 		     $data['msg']='添加用户失败';
 		 }

 		 return $data;

    }



		/** 
		 * [deleteUser 删除]
		 */
 	public function deleteUser(){
 		$id=$_GET['id'];
 		if ($id!=1) {
 			$sql="delete from {$this->table} where id = {$id} ";
        	$res=$this->pdo->exec($sql);
 		}

        if($res){
 		 	  $data['status']=1;
 		      $data['msg']='删除成功';
 		 }else{
 		 	 $data['status']=0;
 		     $data['msg']='删除失败';
 		 }

 		 return $data;

 	}

   /**
    * [queryUser 查看所有用户]
    * @return [type] [description]
    */
 	public function queryUser(){

		$pageSize=isset($_GET['pageSize'])?$_GET['pageSize']:5;
		$page=isset($_GET['page'])?$_GET['page']:0;
		$page=($page-1)*$pageSize;
 		$sql="select * from {$this->table} limit {$page} ,{$pageSize}";
 		$res=$this->pdo->fetchAll($sql);
		if ($res) {
			 $data['status']=1;
 			 $data['rows']=$res;
 			
 		}else{
 			$data['status']=0;
 			 $data['rows']=[];
 		}
 		return $data;

 	}


   /**
    * [logout 登出]
    * @return [type] [description]
    */
 	public function logout(){

		$_SESSION['username']=null;
 		$_SESSION['userid']=null;
 		$data['status']=1;
 		$data['msg']='退出成功';

 		return $data;

 	}

/** 
	 * [checkLogin 检查登录状态]
	 * @return [type] [description]
	 */
    public function checkLogin(){

 		if (isset($_SESSION['username'])&&$_SESSION['username']!=null) {
 		 	  $data['status']=1;
 		      $data['msg']='登录成功';
 		 }else{

 		 	 $data['status']=0;
 		     $data['msg']='登录失败';
 		 }

 		 return $data;
    }

}