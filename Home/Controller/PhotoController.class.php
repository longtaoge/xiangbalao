<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 19:59:17
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 14:58:23
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class PhotoController extends BaseController{

  public function index(){

	 $datas=SuperModel::getInstance()->getPhotos();
	 $this->mSmarty->assign($datas);
  	$this->mSmarty->display(VIEW_PATH.'photos.html');


  }


  /**
   * 打开相册
   */
  public function photosDetail(){
  	$datas=SuperModel::getInstance()->getPhotobyGoods();
	$this->mSmarty->assign($datas);
  	$this->mSmarty->display(VIEW_PATH.'photos_detail.html');
  }





}