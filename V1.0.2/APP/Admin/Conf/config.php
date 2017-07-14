<?php
return array(
	//'配置项'=>'配置值'

	// 显示页面Trace信息
	'SHOW_PAGE_TRACE'	=>false,
	// URL模式
	'URL_MODEL'			=> '2',
	'CFG_CONf'			=>'./APP/Common/Conf/',//网站基本配置文件路径
	// 开启路由
	'URL_ROUTER_ON'   => true, 
	'URL_ROUTE_RULES'=>array(
		'dologin'=>'Login/index', //登录
	),

);
