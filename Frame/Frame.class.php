<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 11:02:00
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-08 09:09:37
 */
namespace Frame;
final class Frame {

	//运行
	public static function start(){
		self::initCharset();//初始化应用字符集
		self::initConfig();//初始化配置
		self::initRoute();//初始化路由
		self::initConst();//常量
		self::initAutoLoad();//自动加载
		self::initDispath();//请求分发

	}
	/**
	 * 初始化字符集
	 * @return [type] [description]
	 */
	private static function initCharset(){
     header("content-type:text/html;charset=utf8");
     @session_start();

	}
	/**
	 * 初始化配置文件
	 * @return [type] [description]
	 */
	private static function initConfig(){
    	$GLOBALS['config']= require_once(APP_PATH.'Conf'.DS.'config.php');
         
	}
 	
 	/**
 	 * 初始化路由参数
 	 * @return [type] [description]
 	 */
	private static function initRoute(){
    	$p=isset($_GET['p' ]) ? $_GET['p' ]:$GLOBALS['config']['default_platform'];
        $c=isset($_GET['c' ]) ? $_GET['c' ] : $GLOBALS['config']['default_controller'];
    	$a=isset($_GET['a'])?$_GET['a']:$GLOBALS['config']['default_action'];
    	define('PLAT', $p);
    	define('ACTION', $a);
    	define('CONTROLLER', $c);
	}

	/**
	 * 定义常量
	 * @return [type] [description]
	 */
	private static function initConst(){

		define('VIEW_PATH', APP_PATH.'View'.DS); //模板路径
		define("FRAME_PATH", ROOT_PATH.DS.'Frame'.DS); 

	}

	/**
	 * 自动加载
	 */
	private static function initAutoLoad(){

		spl_autoload_register(function($className){
          $fileName=ROOT_PATH.DS.str_replace('\\', DS, $className.'.class.php');
          if (file_exists($fileName)) {
          	  require_once($fileName);
          }
		});


	}


	/**
	 * 分发控制器
	 * @return [type] [description]
	 */
	private static function initDispath(){
		$controllerClassName='\\'.PLAT.'\\'.'Controller'.'\\'.CONTROLLER.'Controller';
		$controllerObj=new $controllerClassName();
		$actionName=ACTION;
		$controllerObj->$actionName();

	}


}