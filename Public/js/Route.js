/*
* @Author: longtaoge
* @Date:   2017-09-15 18:08:02
* @Last Modified by:   longtaoge
* @Last Modified time: 2017-09-15 20:59:53
*/
var Home={

?c=Introduce  			// 公司介绍
?c=Category   			//供应产品 
?c=Photo     			// 公司相册
?c=News          		// 公司动态
?c=Contact    			// 联系我们
./admin.php?c=Index     //管理员入口

   goods_name  //商品名
   photo_des   //照名名

  news_id  // 新闻ID

?c=News&a=newsDetail&news_id=<{$row.news_id}>   //公司动态
alt="<{$row.photo_des}>"   //图片


?c=Category&a=detail&goods_id=<{$row.goods_id}>  //产品橱窗


?c=Photo&a=photosDetail&id=<{$row.category_id}>  //照片详情

}