<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 19:30:37
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-15 21:59:49
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
use Home\Model\GoodsModel;
use Home\Model\CategoryModel;
use Home\Model\NewsModel;
use Home\Model\PhotoModel;
final class SuperModel  extends BaseModel{

	private $goods=null;
	private $newgoods=null;
	private $categorys=null;
	private $news=null;
	private $photos=null;
	


	/**
	 * [__call description]
	 * @param  [type] $name      [description]
	 * @param  [type] $arguments [description]
	 * @return [type]            [description]
	 */
	public function __call($name, $arguments){

		// 产品橱窗
		$this->goods=$this->goods!=null?$this->goods:GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		//最新供应
		$this->newgoods=$this->newgoods!=null?$this->newgoods:GoodsModel::getInstance()->fetchAllList('DESC',1,4);
		//左侧分类
		$this->categorys=$this->categorys!=null?$this->categorys:CategoryModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//新闻列表
		$this->news=$this->news!=null?$this->news:NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//相册橱窗
		$this->photos= $this->photos!=null?$this->photos:PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);

		$datas=array(
			'goods'=> $this->goods['rows'],
			'newgoods'=> $this->newgoods['rows'],
			'categorys'=> $this->categorys['rows'],
			'photos'=> $this->photos['rows'],
			'news'=> $this->news['rows'],
			);
		return $datas;

	}


	 


	/**
	 * [getCategory 供应产品]
	 * @return [type] [description]
	 */
	public function getCategory(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,100);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,100);
		//左侧分类
		$this->categorys=$this->categorys!=null?$this->categorys:CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		//新闻列表
		$this->news=$this->news!=null?$this->news:NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//相册橱窗
		$this->photos= $this->photos!=null?$this->photos:PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);

		$datas=array(
			'rows'=> $goods['rows'],
			'categorys'=>$this->categorys['rows'],
			'photos'=> $this->photos['rows'],
			'news'=> $this->news['rows'],
			'newgoods'=> $newgoods['rows'],
			);

		return $datas;

	}

	/**
	 * [getPhotos 公司相册]
	 * @return [type] [description]
	 */
	public function getPhotos(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,100);
	    //左侧分类
		$this->categorys=$this->categorys!=null?$this->categorys:CategoryModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//新闻列表
		$this->news=$this->news!=null?$this->news:NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//相册橱窗
		$this->photos= $this->photos!=null?$this->photos:PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);


		$photoGroup=PhotoModel::getInstance()->getPhotoGroup();
		$datas=array(
			'goods'=> $goods['rows'],
			'categorys'=> $this->categorys['rows'],
			'photos'=>$this->photos['rows'],
			'news'=> $this->news['rows'],
			'newgoods'=> $newgoods['rows'],
			'photoGroup'=> $photoGroup['rows'],
			);

		return $datas;
	}


	/**
	 * [getPhotobyGoods 根据商品ID获取 照片]
	 * @return [type] [description]
	 */
	public function getPhotobyGoods(){
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);

		//新闻列表
		$this->news=$this->news!=null?$this->news:NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		//相册橱窗
		$this->photos= $this->photos!=null?$this->photos:PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);

		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$datas=array(
			'newgoods'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $this->photos['rows'],
			'news'=> $this->news['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}





	/**
	 * [getProduct 商品详情页数据]
	 * @return [type] [description]
	 */
	public function getProduct(){
	
		$photos=PhotoModel::getInstance()->getPhotosByGoods();
		$detailInfo= GoodsModel::getInstance()->getDetail();
	    $newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
	    if (isset($detailInfo['rows']['goods_pic'])) {
	    $photo=[];
	    $photo['photo_url']=$detailInfo['rows']['goods_pic'];
	    $photo['photo_thum_url']=$detailInfo['rows']['goods_pic_thum'];
	    $photo['photo_des']=$detailInfo['rows']['goods_name'];
	     array_push( $photos['rows'],  $photo);
	
	    }


		$datas=array(
			'photos'=> $photos['rows'],
			'detailInfo'=> $detailInfo['rows'],
			'newgoods'=> $newgoods['rows'],
			);

		return $datas;


	}




}