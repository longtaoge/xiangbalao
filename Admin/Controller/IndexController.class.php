<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-08 08:41:54
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-08 23:51:46
 */
namespace Admin\Controller;
use Frame\Libs\BaseController;
final class IndexController extends BaseController {


	/**
	 * 首页
	 * @return [type] [description]
	 */
	public function index(){
			$this->mSmarty->display(VIEW_PATH.'index.html');
	}

	/**
	 * 用户列表页
	 * @return [type] [description]
	 */
    public function user_list(){
    	$this->mSmarty->display(VIEW_PATH.'user_list.html');
    }

    /**
     * 分类页
     * @return [type] [description]
     */
    public function category(){
    	$this->mSmarty->display(VIEW_PATH.'category.html');
    }


    /**
     * 二级分类
     * @return [type] [description]
     */
    public function brand(){
    	$this->mSmarty->display(VIEW_PATH.'brand.html');
    }


    /**
     * 展示商品列表页
     * @return [type] [description]
     */
    public function goods_list(){
        $this->mSmarty->display(VIEW_PATH.'goods_list.html');
    }

    /**
     * 设置页
     * @return [type] [description]
     */
    public function settings(){
        $this->mSmarty->display(VIEW_PATH.'settings.html');

    }

}