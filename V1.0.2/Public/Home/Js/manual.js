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
    $('.panel-body,.panel').height($(window).height()-85);
    //$('.panel-body').css('padding-bottom',80);

    // 左侧菜单自动适应高度
    $('.sidebar-offcanvas .tab-pane').height($(window).height()-170);
    //$('.sidebar-offcanvas .tab-pane').css('overflow-y','auto');
});
