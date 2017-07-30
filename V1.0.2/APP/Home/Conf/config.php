<?php
return array(
	//'配置项'=>'配置值'
	//模板布局
	'LAYOUT_ON'=>true,
	'LAYOUT_NAME'=>'layout',
	// URL模式
	'URL_MODEL'			=> '2',
	// 开启路由
	'ERROR_PAGE' =>__ROOT__.'/error.html', // 定义公共错误模板
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES'=>array(
		'manual/:pid'=>'Manual/index',
		'main'=>'Manual/main',
		'search'=>'Manual/ajax_key',
		//'Home'=>'__ROOT__'
	),
);