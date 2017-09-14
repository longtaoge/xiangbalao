<?php
/**
 * @Author: longtaoge
 * @Date:   2017-09-13 19:30:37
 * @Last Modified by:   longtaoge
 * @Last Modified time: 2017-09-14 17:43:33
 */
namespace Home\Model;
use Frame\Libs\BaseModel;
use Home\Model\GoodsModel;
use Home\Model\CategoryModel;
use Home\Model\NewsModel;
use Home\Model\PhotoModel;
final class SuperModel  extends BaseModel{






	/** 
	 * [getIndex 获取首页数据]
	 * @return [type] [description]
	 */
	public  function getIndex(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,4);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,5);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,5);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',3,2);
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			);


		return $datas;
	}


	/**
	 * [getIntroduce 获取公司介绍页面信息]
	 * @return [type] [description]
	 */
	public function getIntroduce(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,4);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
	

		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',3,2);
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			
			);


		return $datas;
	}


	/**
	 * [getCategory 供应产品]
	 * @return [type] [description]
	 */
	public function getCategory(){

		$goods= GoodsModel::getInstance()->fetchAllList('DESC',1,100);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,5);
	
		$datas=array(
			'rows'=> $goods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
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
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,50);
		$photoGroup=PhotoModel::getInstance()->getPhotoGroup();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',3,2);
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'photoGroup'=> $photoGroup['rows'],
			);

		return $datas;
	}


	/**
	 * [getPhotobyGoods 照片]
	 * @return [type] [description]
	 */
	public function getPhotobyGoods(){


		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}


	/** 
	 * [getNews 获取新闻页数据]
	 * @return [type] [description]
	 */
	public function getNews(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}


	/**
	 * [getCooperate 全作交流页数据]
	 * @return [type] [description]
	 */
	public function getCooperate(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}

	public function  getCustomer(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}


		public function  getMap(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}	



		public function   getContact(){

		$goods= GoodsModel::getInstance()->fetchAllList('ASC',1,4);
		$newgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,3);
		//左侧
		$categorys =CategoryModel::getInstance()->fetchSomeIndex('ASC',1,100);
		$news= NewsModel::getInstance()->fetchSomeIndex('ASC',1,3);
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		$lnewgoods= GoodsModel::getInstance()->fetchAllList('DESC',1,2);
		
		$datas=array(
			'rows'=> $goods['rows'],
			'newrows'=> $newgoods['rows'],
			'categorys'=> $categorys['rows'],
			'photos'=> $photos['rows'],
			'news'=> $news['rows'],
			'lnewgoods'=> $lnewgoods['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			);

		return $datas;

	}


	/**
	 * [getProduct 商品详情页数据]
	 * @return [type] [description]
	 */
	public function getProduct(){
	
		$photos=PhotoModel::getInstance()->fetchSomeIndex('ASC',1,2);
		//分类图片
		$categoryPhoto=PhotoModel::getInstance()->getPhotosByCategory();
		
		$detailInfo= GoodsModel::getInstance()->getDetail();
		$datas=array(
			'photos'=> $photos['rows'],
			'categoryPhoto'=> $categoryPhoto['rows'],
			'detailInfo'=> $detailInfo['rows'],
			);

		return $datas;


	}




}