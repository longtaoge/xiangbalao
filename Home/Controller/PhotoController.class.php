<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:59:17
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 20:03:37
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class PhotoController extends BaseController{

  public function index(){

  	$this->mSmarty->display(VIEW_PATH.'photos.html');


  }


}