<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:24:54
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 17:14:07
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
use Home\Model\SuperModel;
final class ContactController extends BaseController {

 	public function index(){
 		$datas=SuperModel::getInstance()->getContact();
		$this->mSmarty->assign($datas);
 		$this->mSmarty->display(VIEW_PATH.'contact.html');
 	}

}