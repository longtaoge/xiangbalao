/*
* @Author: longtaoge
* @Date:   2017-09-08 17:13:06
* @Last Modified by:   longtaoge
* @Last Modified time: 2017-09-10 22:03:14
*/
var Admin ={
	index:'?c=User',  //首页
	login:'?c=User&a=login', //登录
	checkLogin:'?c=User&a=checkLogin', //检查登录
	logout:"?c=User&a=logout", //登出
	queryUser:"?c=User&a=queryUser", //查询用户
	deleteUser:"?c=User&a=deleteUser", //删除用户
	addUser:"?c=User&a=addUser", //添加用户
	user_list:"?c=Index&a=user_list", //用户列表
	category_list:"?c=Category&a=CategoryList", //分类列表
	categoryAdd:"?c=Category&a=categoryAdd", // 添加分类
	brandList:"?c=Brand&a=brandList", // 品牌列表
	brandAdd:"?c=Brand&a=brandAdd", // 添加品牌
	brandPicAdd:"Admin.php?c=Brand&a=brandPicAdd", // 添加品牌LOGO
	goodsList:"Admin.php?c=Goods&a=goodsList" // 添加品牌LOGO

};