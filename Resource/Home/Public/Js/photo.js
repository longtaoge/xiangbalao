/*
* @Author: longtaoge
* @Date:   2017-09-05 15:56:08
* @Last Modified by:   longtaoge
* @Last Modified time: 2017-09-12 21:13:13
*/
  //当前显示的轮播项的索引
    var nextIndex = 0; //控制切换的索引 下一个
    //所有大图的集合
    var bigimgs = document.querySelector('.bigimg').querySelectorAll('img');
    //所有小图的集合
    var smallimgs = document.querySelector('.smallimg').querySelectorAll('.border');

    var potho = document.querySelector('.potho');

    //点击事件
    potho.onclick = function(e) {
        //点击事件兼容
        var _e = window.event || e; //事件对象
        var _target = _e.target || _e.srcElement; //点到谁，谁就是_target

        if (_target.tagName.toLowerCase() == "a") {

            //左右按钮
            if (_target.className.indexOf("l") != -1) { //左按钮
                nextIndex--;
                if (nextIndex < 0) {
                    //如果到第一轮播项，再点击左侧按钮时，轮播项切换到最后一个
                    nextIndex = bigimgs.length - 1;
                }
            } else { //右侧按钮
                nextIndex++; //要切换到下一项
                if (nextIndex > bigimgs.length - 1) {
                    //如果到最后一个轮播项，再点击右侧按钮时，轮播项切换到第一个
                    nextIndex = 0;
                }
            }
            console.log(nextIndex);
            //TODO 修改样式
            change();
        } else if (_target.className.toLowerCase() == "mask") {
            var t = _target.parentNode;
            var mask = document.querySelector('.smallimg').querySelectorAll('.mask');
            for (var i = 0; i < mask.length; i++) {
                if (mask[i] == _target) {
                    console.log(i);
                    nextIndex = i;
                }
            }

            change();

        }

    }

    /**
     * 鼠标移动事件
     * @param  {[type]} e [description]
     * @return {[type]}   [description]
     */
    potho.onmouseover = function(e) {

        var _e = window.event || e; //事件对象
        var _target = _e.target || _e.srcElement; //点到谁，谁就是_target
        if (_target.className.toLowerCase() == "mask") {
            var t = _target.parentNode;
            var mask = document.querySelector('.smallimg').querySelectorAll('.mask');
            for (var i = 0; i < mask.length; i++) {
                if (mask[i] == _target) {
                    console.log(i);
                    nextIndex = i;
                }
            }
            change();

        }

    }

     /**
      * 修改样式
      * @return {[type]} [description]
      */
    function change() {
        for (var i = 0; i < bigimgs.length; i++) {
            bigimgs[i].className = '';
            smallimgs[i].className = 'border';
        }
        bigimgs[nextIndex].className = 'activi';
        smallimgs[nextIndex].className = 'border activi';

    }
