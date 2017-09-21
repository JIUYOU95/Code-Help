/**
 * Created by Administrator on 2017/9/2.
 */
require.config({
    baseUrl: app.base + '/js',
    paths:{
        'css':'css.min',
        'jquery':'jquery.min',
        'angular':'angular.min',
        //angular分页
        'pagination':'pagination',
        'bootstrap':'../dist/bootstrap/js/bootstrap.min',
        'select':'../dist/bootstrap-select/js/bootstrap-select',
        'select2':'../dist/select2/dist/js/i18n/zh-CN',
        'vselect2':'../dist/select2/dist/js/select2.min',
        'layui':'../dist/layui/layui',
        //函数库
        'underscore': '../js/underscore-min',
    },
    shim: {
        'hd': {
            // exports: 'modal',
            init: function () {
                return {
                    modal: modal,
                    success: success,
                }
            }
        },
        // bootstrap前端优化
        'bootstrap': {
            'deps': ['jquery', 'css!../dist/bootstrap/css/bootstrap.min.css', 'css!../dist/font-awesome/css/font-awesome.min.css','css!../css/app.css']
        },
        // bootstrap-select下拉组件
        'select':{
            'deps':['bootstrap','css!../dist/bootstrap-select/css/bootstrap-select.css']
        },
        // 下拉菜单
        'select2':{
            'deps':['bootstrap','vselect2','css!../dist/select2/dist/css/select2.min.css']
        },
        // layui组件
        'layui':{
            'deps':['css!../dist/layui/css/layui.css']
        },
        // angular分页
        'pagination':{
            'deps':['angular']
        },
    }
});
