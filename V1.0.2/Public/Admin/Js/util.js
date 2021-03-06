(function (window) {
    util = {
    	 /**
         * 异步发送表单
         * @param options
         */
        submit:function (opt) {
            
           var options = $.extend({
                el: 'form',
                url: 'Login/login',
                data: '',
                successUrl: 'back',
                callback: '',
            }, opt);
            var data = options.data == '' ? $(options.el).serialize() : options.data;
            $.ajax({
                url: options.url,
                type: 'post',
                cache: false,
                data: data,
                dataType: "json",
                success: function (json) {

                        if ($.isFunction(options.callback)) {
                            options.callback(json);
                        } else {
                            if (json.valid == 1) {
                                util.message(json.message, options.successUrl, 'success');
                            } else {
                                util.message(json.message, '', 'info');
                            }
                        }
                    
                    //options.callback(json);
                    //return json;
                }
            });
            return false;
           
        },

         //消息提示
        message: function (msg, redirect, type, timeout, options) {
            if ($.isArray(msg)) {
                msg = msg.join('<br/>');
            }
            timeout = timeout ? timeout : 3;
            if (!redirect && !type) {
                type = 'info';
            }
            if ($.inArray(type, ['success', 'error', 'info', 'warning']) == -1) {
                type = '';
            }
            if (type == '') {
                type = redirect == '' ? 'error' : 'success';
            }
            var icons = {
                success: 'check-circle',
                error: 'times-circle',
                info: 'info-circle',
                warning: 'exclamation-triangle'
            };
            switch (type) {
                case 'success':
                    fa = 'fa-check-circle';
                    break;
                case 'warning':
                    fa = 'fa-warning';
                    break;
                case 'error':
                    fa = 'fa-times-circle';
                    break;
                case 'info':
                    fa = 'fa-info-circle';
                    break;
            }
            var h = '';
            if (redirect && redirect.length > 0) {
                if (redirect == 'back') {
                    h = '<p><a href="javascript:;" onclick="history.go(-1)" target="main" data-dismiss="modal" aria-hidden="true">如果你的浏览器在 <span id="timeout">' + timeout + '</span> 秒后没有自动跳转，请点击此链接</a></p>';
                    redirect = document.referrer;
                } else if (redirect == 'refresh') {
                    redirect = location.href;
                    h = '<p><a href="' + redirect + '" target="main" data-dismiss="modal" aria-hidden="true">系统将在 <span id="timeout"></span> 秒后刷新页面</a></p>';
                } else {
                    h = '<p><a href="' + redirect + '" target="main" data-dismiss="modal" aria-hidden="true">如果你的浏览器在 <span id="timeout">' + timeout + '</span> 秒后没有自动跳转，请点击此链接</a></p>';
                }
            }
            var content =
                '           <i class="pull-left fa fa-4x fa-' + icons[type] + '"></i>' +
                '           <div class="pull-left"><p>' + msg + '</p>' + h +
                '           </div>' +
                '           <div class="clearfix"></div>';
            var footer =
                '           <button type="button" class="btn btn-default" data-dismiss="modal">确认</button>';

            var modalobj = util.modal($.extend({
                title: '系统提示',
                content: content,
                footer: footer,
                id: 'modalMessage'
            }, options));
            modalobj.find('.modal-content').addClass('alert alert-' + type);
            if (redirect) {
                var timer = '';
                modalobj.find("#timeout").html(timeout);
                modalobj.on('show.bs.modal', function () {
                    doredirect();
                });
                modalobj.on('hide.bs.modal', function () {
                    timeout = 0;
                    doredirect();
                });
                modalobj.on('hidden.bs.modal', function () {
                    modalobj.remove();
                });
                function doredirect() {
                    timer = setTimeout(function () {
                        if (timeout <= 0) {
                            modalobj.modal('hide');
                            clearTimeout(timer);
                            window.location.href = redirect;
                            return;
                        } else {
                            timeout--;
                            modalobj.find("#timeout").html(timeout);
                            doredirect();
                        }
                    }, 1000);
                }
            }
            modalobj.modal('show');
            return modalobj;
        },
        //确认提示框
        confirm: function (content, callback, options) {
            var content =
                '           <i class="pull-left fa fa-4x fa-info-circle"></i>' +
                '           <div class="pull-left"><p>' + content + '</p>' +
                '           </div>' +
                '           <div class="clearfix"></div>';
            var modalobj = util.modal($.extend({
                title: '系统提示',
                content: content,
                footer: '<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>' +
                '<button type="button" class="btn btn-primary confirm">确定</button>',
                events: {
                    confirm: function () {
                        if ($.isFunction(callback)) {
                            modalobj.modal('hide');
                            callback();
                        }
                    }
                }
            }, options));
            modalobj.find('.modal-content').addClass('alert alert-info');
            return modalobj;
        },
        //显示模态框
        modal: function (options) {
            var opt = $.extend({
                title: '',//标题
                content: '',//内容
                footer: '',//底部
                id: 'hdMessage',//模态框id
                width: 600,//宽度
                class: '',//样式
                option: {},//bootstrap模态框选项
                events: {},//事件,参考bootstrap
            }, options);
            var modalObj = $("#" + opt.id);
            if (modalObj.length == 0) {
                $(document.body).append('<div class="modal fade" id="' + opt.id + '"role="dialog" tabindex="-1" role="dialog" aria-hidden="true"></div>');
                modalObj = $("#" + opt.id);
            }
            var html = '<div class="modal-dialog" role="document">' +
                '<div class="modal-content ' + opt.class + '">';
            if (opt.title) {
                html += '<div class="modal-header">'
                    + '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
                    + '<span aria-hidden="true">&times;</span></button>'
                    + '<h4 class="modal-title">' + opt.title + '</h4></div>';
            }
            //模态框内容
            if (opt.content) {
                if (!$.isArray(opt.content)) {
                    html += '<div class="modal-body">' + opt.content + '</div>';
                } else {
                    html += '<div class="modal-body">正在加载中...</div>';
                }
            }
            if (opt.footer) {
                html += '<div class="modal-footer">' + opt.footer + '</div>';
            }
            html += "</div></div>";
            modalObj.html(html);
            if (opt.width) {
                modalObj.find('.modal-dialog').css({width: opt.width});
            }
            if (opt.content && $.isArray(opt.content)) {
                //将异步加载内容放入模态体中
                var callback = function (d) {
                    modalObj.find('.modal-body').html(d);
                }
                if (opt.content.length == 2) {
                    $.post(opt.content[0], opt.content[1]).done(callback);
                } else {
                    $.get(opt.content[0]).done(callback);
                }
            }
            //绑定模态事件
            $(opt.events).each(function (i) {
                for (name in opt.events) {
                    if (typeof opt.events[name] == 'function') {
                        modalObj.on(name, opt.events[name]);
                    }
                }
            });
            //点击确定按钮事件
            if (typeof opt.events['confirm'] == 'function') {
                modalObj.find('.confirm', modalObj).on('click', function () {
                    options.events['confirm'](modalObj);
                    //隐藏模态框
                    modalObj.modal('hide');
                });
            }
            //关闭模态框时删除他
            modalObj.on('hidden.bs.modal', function () {
                modalObj.remove();
            });
            /**
             * 有确定按钮时添加事件
             * 当点击确定时删除模态框
             */
            modalObj.on('hidden.bs.modal', function () {
                modalObj.remove();
            });
            //点击取消按钮事件
            if (typeof opt.events['cancel'] == 'function') {
                modalObj.find('.cancel', modalObj).on('click', function () {
                    options.events['cancel'](modalObj);
                });
            }
            return modalObj.modal(opt);
        },
        

        
        
    };
})(window);