$(function() {
	//侧栏列表
    $(".accordion li div").click(function(){
        $(".accordion li div").removeClass("active");
        $(".submenu li").removeClass("active");
        $(this).addClass("active");
    });
    $(".submenu li").click(function(){
        $(".submenu li").removeClass("active");
        $(".accordion li div").removeClass("active");
        $(this).addClass("active");
    });
    var Accordion = function(el, multiple) {
        this.el = el || {};
        this.multiple = multiple || false;

        // Variables privadas
        var links = this.el.find('.link');
        // Evento
        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
    }

    Accordion.prototype.dropdown = function(e) {
        var $el = e.data.el;
            $this = $(this),
            $next = $this.next();

        $next.slideToggle();
        $this.parent().toggleClass('open');

        if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
        };
    }   

    var accordion = new Accordion($('#accordion'), true);

    // 动态调整iframe的高度以适应不同高度的显示器
    $('.panel-body,.panel').height($(window).height()-110);
    //$('.panel-body').css('padding-bottom',80);

    // 左侧菜单自动适应高度
    $('.sidebar-offcanvas .tab-pane').height($(window).height()-170);
    //$('.sidebar-offcanvas .tab-pane').css('overflow-y','auto');


    $('.navicon').click(function(){
        $(".window-body").toggleClass("active");
    });
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


