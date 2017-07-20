<?php
return array(
	//'配置项'=>'配置值'
	//模板布局
	'LAYOUT_ON'=>false,
	'LAYOUT_NAME'=>'layout',
	// URL模式
	'URL_MODEL'			=> '2',
	// 开启路由
	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES'=>array(
		'manual/:pid'=>'Manual/index',
		'main'=>'Manual/main',
		//'Home'=>'__ROOT__'
	),
);