<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 11:03:10
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-08 08:56:14
 */
//定义分动态分隔符
define('DS', DIRECTORY_SEPARATOR);
//获取项目根目录绝对路径
define("ROOT_PATH", getcwd());
//前端应用目录
define("APP_PATH", ROOT_PATH.DS.'Admin'.DS);
//导入框架文件
require_once(ROOT_PATH.DS.'Frame'.DS.'Frame.class.php');
//开始运行
\Frame\Frame::start();
 