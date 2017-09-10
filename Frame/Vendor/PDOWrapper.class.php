<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-08 14:05:58
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-09 14:06:17
 */
namespace Frame\Vendor;
use\PDO;
final class PDOWrapper{

	private $db_type;
	private $db_host;
	private $db_name;
	private $db_port;
	private $db_user;
	private $db_pass;
	private $db_charset;
	private $pdo=null;


	function __construct(){

		$this->db_type=$GLOBALS['config']['db_type'];
		$this->db_prot=$GLOBALS['config']['db_port'];
		$this->db_host=$GLOBALS['config']['db_host'];
		$this->db_user=$GLOBALS['config']['db_user'];
		$this->db_pass=$GLOBALS['config']['db_pass'];
		$this->db_name=$GLOBALS['config']['db_name'];
		$this->db_charset=$GLOBALS['config']['db_charset'];

		$this->createPDO();
		$this->setErrModel();

	}

	/**
	 * 创建数据库对象
	 * @return [type] [description]
	 */
	private function createPDO(){

		try{

			$dns="{$this->db_type}:host={$this->db_host};port={$this->db_port};";
			$dns.="dbname={$this->db_name};charset={$this->db_charset}";
			$this->pdo=new PDO($dns,$this->db_user,$this->db_pass);
		}catch(PDOException $e){
		 $this->showMessage($e);
		}


	}


	/**
	 * 查询一行
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function fetchOne($sql){

		$type=substr(trim($sql), 0,6);
		if (strtolower($type)!='select') {	 
			return $this->exec($sql);	
		}

 
		try{
			$mPDOStatement =$this->pdo->query($sql);
			return $mPDOStatement->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			$this->showMessage($e);
		}

	}

	/** 
	 * 查询多行
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function fetchAll($sql){

		$type=substr(trim($sql), 0,6);


		if (strtolower($type)!='select') {
			return $this->exec($sql);	
		}


		try{

			$mPDOStatement=$this->pdo->query($sql);
			return $mPDOStatement->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){

			$this->showMessage($e);
		}


	}


	/**
	 * 查询行数
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function rowCount($sql){

		try{

			$mPDOStatement =$this->pdo->query($sql);
			return $mPDOStatement->rowCount();
		}catch(PDOException $e){
			
			$this->showMessage($e);
		}

	}


	/**
	 * [exec description]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function exec($sql){
		$type=substr(trim($sql), 0,6);
		if (strtolower($type)=='select') {
			echo "请使用fetch方法进行数据查询"; 	
			die();
		}
		try{
			return  $this->pdo->exec($sql);
			 
		}catch(PDOException $e){
			$this->showMessage($e);
		}

	}


	/**
	 * 设置错误模式
	 */
	private function setErrModel(){
		$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	/**
	 * 显示错误信息
	 * @param  [type] $e [description]
	 * @return [type]    [description]
	 */
	private function showMessage($e){
		echo "<h2> sql错误 </h2>";
		echo "错误编号: ".$e.getCode();
		echo "错误行号: ".$e.getLine();
		echo "错误文件: ".$e.getFile();
		echo "错误信息: ".$e.getMessage();
		die();
	}



}