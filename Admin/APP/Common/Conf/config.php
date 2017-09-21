<?php
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql',     // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'ys',          // 数据库名
    'DB_USER'   => 'root',      // 用户名
    'DB_PWD'    => 'root',          // 密码
    'DB_PORT'   => '3306',        // 端口
    'DB_PREFIX' => 'gd_',    // 数据库表前缀

    'URL_MODEL'          => '2', //URL模式
    'DEFAULT_MODULE'     => 'Home', //默认模块
    'DEFAULT_CONTROLLER' => 'Index', // 默认控制器名称
    'DEFAULT_ACTION'     => 'index', // 默认操作名称
    'DEFAULT_FILTER'     => '', // 默认参数过滤方法 用于I函数...


    'ERROR_PAGE'  => '/Public/error.html', // 定义公共错误模板

    //默认错误跳转对应的模板文件
    'TMPL_ACTION_ERROR'   => 'Public:error',//默认成功跳转对应的模板文件
    'TMPL_ACTION_SUCCESS' => 'Public:success',

    'TAGLIB_BUILD_IN' => 'Cx,Common\Tag\My',



);