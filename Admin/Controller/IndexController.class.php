<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-08 08:41:54
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-13 11:35:44
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
use \Admin\Model\IndexModel;
final class IndexController extends BaseController {


	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){

		$this->denyAccess();


	if (isset($_GET['page'])) {
			$model= IndexModel::getInstance();
			$data=$model->fetchMix();	 
			echo json_encode($data);
		}else{
			$this->mSmarty->display(VIEW_PATH.'index.html');
		}

	}
    

   

    


}