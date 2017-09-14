<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:06:30
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 23:17:50
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
use Home\Model\NewsModel;
final class NewsController extends BaseController{

	public function index(){
		$datas=SuperModel::getInstance()->getNews();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'news.html');
	}


	public function newsDetail(){
		$datas=NewsModel::getInstance()->getDetail();
		$this->mSmarty->assign($datas);
		$this->mSmarty->display(VIEW_PATH.'news_detail.html');
	}

}