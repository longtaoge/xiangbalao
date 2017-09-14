
NProgress.start();

window.onload = function () {
   NProgress.done(); 
}

$('.navs ul').prev('a').on('click', function () {
	$(this).next().slideToggle();
});

// 检测是否登录
$.ajax({
    url: Admin.checkLogin,
    type: 'get',
    success: function (info) {
        info=$.parseJSON(info);
        //info=JSON.parse(info);;
       
        if(info.status!=1) {
           location.href = Admin.index;
        }
    },
});

$('#logout').on('click', function () {
    $.ajax({
        url: Admin.logout,
        type: 'get',
        success: function (info) {
             info=$.parseJSON(info);
            if(info.status) {
                location.href = Admin.index;
            }
        }
    });
})