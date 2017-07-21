$('body').niceScroll({
    cursorcolor: "#9d9d9d",//#CC0071 光标颜色
    cursoropacitymax: 1, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
    touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
    scrollspeed:60,//滚动速度
    autohidemode: false, //是否隐藏滚动条
    cursorwidth:8,	//像素光标的宽度
    horizrailenabled:false,
    cursorborder:"1px solid #9d9d9d"//游标边框css定义
});

// window.onload = function() {
//     document.onkeydown = function() {
//         var e = window.event || arguments[0];
//         //屏蔽F12
//         if(e.keyCode == 123) {
//             return false;
//         //屏蔽Ctrl+Shift+I
//         }else if((e.ctrlKey) && (e.shiftKey) && (e.keyCode == 73)) {
//             return false;
//         //屏蔽Shift+S
//         }else if((e.ctrlKey) && (e.keyCode == 83)){
//             return false;
//         //屏蔽Shift+F10
//         }else if((e.shiftKey) && (e.keyCode == 121)){
//             return false;
//         }
//     };
//     //屏蔽右键单击
//     document.oncontextmenu = function(){
//         return false;
//     }
// }
