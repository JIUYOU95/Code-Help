(function (window) {
    util = {
    	 /**
         * 异步发送表单
         * @param options
         */
        submit:function (opt) {
            
           var options = $.extend({
                el: 'form',
                url: 'login',
                data: '',
                successUrl: 'back',
                callback: '',
            }, opt);
            
                var data = options.data == '' ? $(options.el).serialize() : options.data;
                console.log(data);
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
                      
                    }
                });
                return false;
           
        },
        
        
    }
})(window);