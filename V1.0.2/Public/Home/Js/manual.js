$(function() {
	//侧栏列表
	var sided=$(".submenu a");
    sided.click(function(){
        $(".submenu a").removeClass("pc");
        $(this).addClass("pc");
    });

    // 动态调整iframe的高度以适应不同高度的显示器
    $('.panel-body,.panel').height($(window).height());
    $('.panel-body').css('padding-bottom',80);

    // 左侧菜单自动适应高度
    $('.sidebar-offcanvas .tab-pane').height($(window).height());
    $('.sidebar-offcanvas .tab-pane').css('overflow-y','auto');
});
