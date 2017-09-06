<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-06 20:24:54
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-06 20:27:32
 */
namespace Home\Controller;
use Frame\Libs\BaseController;
final class ContactController extends BaseController {

 	public function index(){
 		$this->mSmarty->display(VIEW_PATH.'contact.html');
 	}

}