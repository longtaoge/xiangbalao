<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-08 13:59:56
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:43:17
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use Admin\Model\UserModel;
final class UserController extends BaseController{


	/**
	 * 显示登录页
	 * @return [type] [description]
	 */
	public function index(){
		 $this->mSmarty->display(VIEW_PATH.'login.html');
	}
 

	/**
	 * 用户列表页
	 * @return [type] [description]
	 */
    public function userList(){
    	$this->mSmarty->display(VIEW_PATH.'user_list.html');
    }

 	/**
 	 * 登录
 	 * @return [type] [description]
 	 */
 	public function login(){
 		  $model=  UserModel::getInstance();
 		  $data=$model->login();
 		  echo json_encode($data);
 	}

 	/**
 	 * 退出
 	 * @return [type] [description]
 	 */
 	public function logout(){
		$model=  UserModel::getInstance();
 		$data=$model->logout();
 		echo json_encode($data);

 	}

 	/**
 	 * 检查登录状态
 	 * @return [type] [description]
 	 */
 	public function checkLogin(){
 		   $model=  UserModel::getInstance();
 		   $data=$model->checkLogin();
		   echo json_encode($data);
    
 	}

 	/**
 	 * 获取所有用户信息
 	 * @return [type] [description]
 	 */
 	public function queryUser(){
 		$model=  UserModel::getInstance();
 		$data=$model->queryUser();
 		echo json_encode($data);

 	}


 	/**
 	 * 删除用户
 	 * @return [type] [description]
 	 */
 	public function deleteUser(){
 		$model =  UserModel::getInstance();
 		$data=$model->deleteUser();
		echo json_encode($data);
 	}


 	/**
 	 * 添加用户页显示界面
 	 * @return [type] [description]
 	 */
 	public function userAdd(){
 		$this->mSmarty->display(VIEW_PATH.'user_add.html');
 	}


 	/** 
 	 * 添加用户
 	 */
 	public function addUser(){
 		  $model=  UserModel::getInstance();
 		  $data=$model->addUser();
 		  echo json_encode($data);


 	}

  /**
     * 设置页
     * @return [type] [description]
     */
    public function settings(){
        $this->mSmarty->display(VIEW_PATH.'settings.html');

    }
}