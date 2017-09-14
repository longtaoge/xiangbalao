/*
* @Author: longtaoge
* @Date:   2017-09-08 17:13:06
* @Last Modified by:   longtaoge
* @Last Modified time: 2017-09-14 00:55:31
*/
var Admin ={
	index:'?c=User',  //用户首页
	adminHome:'?c=Index',  //后台首页
	login:'?c=User&a=login', //登录
	checkLogin:'?c=User&a=checkLogin', //检查登录
	logout:"?c=User&a=logout", //登出
	queryUser:"?c=User&a=queryUser", //查询用户
	deleteUser:"?c=User&a=deleteUser", //删除用户
	addUser:"?c=User&a=addUser", //添加用户
	userList:"?c=User&a=userList", //用户列表
	categoryList:"?c=Category&a=CategoryList", //分类列表
	categoryAdd:"?c=Category&a=categoryAdd", // 添加分类
	brandList:"?c=Brand&a=brandList", // 品牌列表
	brandAdd:"?c=Brand&a=brandAdd", // 添加品牌
	brandPicAdd:"Admin.php?c=Brand&a=brandPicAdd", // 添加品牌LOGO
	goodsAdd:"Admin.php?c=Goods&a=goodsAdd", // 添加商品LOGO
	goodsList:"Admin.php?c=Goods&a=goodsList", // 获取商品列表
	goodsAddProduct:"Admin.php?c=Goods&a=goodsAddProduct", // 添加商品
	photoAdd:"Admin.php?c=Photo&a=photoAdd", // 添加图片
	photoUpload:"Admin.php?c=Photo&a=photoUpload", // 上传图片
	photoQuery:"Admin.php?c=Photo&a=photoQuery", // 获取所有图片
	deletePhoto:"Admin.php?c=Photo&a=deletePhoto", // 删除图片
	newsAdd:"Admin.php?c=News&a=newsAdd", // 添加新闻
	newsQuery:"Admin.php?c=News&a=newsQuery", // 添加新闻

};