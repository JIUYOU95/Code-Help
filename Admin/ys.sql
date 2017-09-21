# Host: localhost  (Version: 5.5.53)
# Date: 2017-09-21 14:40:19
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gd_admin"
#

DROP TABLE IF EXISTS `gd_admin`;
CREATE TABLE `gd_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `phone` bigint(11) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态 用户状态 1可登录，2不可登录',
  `regtime` int(11) NOT NULL COMMENT '注册时间',
  `loginip` varchar(20) NOT NULL COMMENT '最近一次登陆ip',
  `logintime` int(11) NOT NULL COMMENT '最近一次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

#
# Data for table "gd_admin"
#

/*!40000 ALTER TABLE `gd_admin` DISABLE KEYS */;
INSERT INTO `gd_admin` VALUES (1,'admin','d41d8cd98f00b204e9800998ecf8427e',NULL,'',1,1504167550,'127.0.0.1',1505975959),(2,'edit','d41d8cd98f00b204e9800998ecf8427e',0,'',1,1505905325,'127.0.0.1',1505975951);
/*!40000 ALTER TABLE `gd_admin` ENABLE KEYS */;

#
# Structure for table "gd_auth_group"
#

DROP TABLE IF EXISTS `gd_auth_group`;
CREATE TABLE `gd_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '分组名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户组表';

#
# Data for table "gd_auth_group"
#

/*!40000 ALTER TABLE `gd_auth_group` DISABLE KEYS */;
INSERT INTO `gd_auth_group` VALUES (1,'系统管理员',1,'1,3,27,2,4,7,8,10,5,6'),(2,'编辑',1,'1,3,27');
/*!40000 ALTER TABLE `gd_auth_group` ENABLE KEYS */;

#
# Structure for table "gd_auth_group_access"
#

DROP TABLE IF EXISTS `gd_auth_group_access`;
CREATE TABLE `gd_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户组ID',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户和组对应关系表';

#
# Data for table "gd_auth_group_access"
#

/*!40000 ALTER TABLE `gd_auth_group_access` DISABLE KEYS */;
INSERT INTO `gd_auth_group_access` VALUES (2,2);
/*!40000 ALTER TABLE `gd_auth_group_access` ENABLE KEYS */;

#
# Structure for table "gd_auth_rule"
#

DROP TABLE IF EXISTS `gd_auth_rule`;
CREATE TABLE `gd_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '地址路径',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='规则表';

#
# Data for table "gd_auth_rule"
#

/*!40000 ALTER TABLE `gd_auth_rule` DISABLE KEYS */;
INSERT INTO `gd_auth_rule` VALUES (1,0,'Theme/Index/master','后台首页',1,1,''),(2,0,'Admin/ShowNav/config','系统设置',1,1,''),(3,1,'Theme/Index/Welcome','欢迎页面',1,1,''),(4,2,'Module/Config/nav','菜单管理',1,1,''),(5,2,'Module/Config/set','系统设置',1,1,''),(6,2,'Module/Config/log','系统日志',1,1,''),(7,4,'Module/Config/add_nav','菜单新增',1,1,''),(8,4,'Module/Config/edit_nav','菜单修改',1,1,''),(9,4,'Module/Config/delete_nav','菜单删除',1,1,''),(10,4,'Module/Config/nav_order','菜单排序',1,1,''),(11,0,'Admin/ShowNav/rule','权限控制',1,1,''),(12,11,'Module/Rule/rule','权限列表',1,1,''),(13,11,'Module/Rule/group','用户组管理',1,1,''),(14,11,'Module/Rule/admin','管理员列表',1,1,''),(15,12,'Module/Rule/add_rule','新增权限列表',1,1,''),(16,12,'Module/Rule/edit_rule','修改权限列表',1,1,''),(17,12,'Module/Rule/delete_rule','删除权限列表',1,1,''),(18,13,'Module/Rule/add_group','新增用户组',1,1,''),(19,13,'Module/Rule/edit_group','修改用户组',1,1,''),(20,13,'Module/Rule/delete_group','删除用户组',1,1,''),(21,13,'Module/Rule/rule_group','分配权限',1,1,''),(22,14,'Module/Rule/add_admin','新增管理员',1,1,''),(23,14,'Module/Rule/edit_admin','修改管理员',1,1,''),(24,14,'Module/Rule/delete_admin','删除管理员',1,1,''),(25,14,'Module/Rule/lockHandle','管理员状态更改',1,1,''),(26,14,'Module/Rule/empty_password','清空密码',1,1,''),(27,1,'Theme/Index/pwd','密码修改',1,1,''),(28,6,'Module/Config/alldel','日志删除',1,1,'');
/*!40000 ALTER TABLE `gd_auth_rule` ENABLE KEYS */;

#
# Structure for table "gd_config"
#

DROP TABLE IF EXISTS `gd_config`;
CREATE TABLE `gd_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system` text NOT NULL COMMENT '网站配置',
  `wechat` text COMMENT '微信配置',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='配置表';

#
# Data for table "gd_config"
#

/*!40000 ALTER TABLE `gd_config` DISABLE KEYS */;
INSERT INTO `gd_config` VALUES (1,'{\"webname\":\"ThinkPHP\",\"icp\":\"粤ICP备 8888888\",\"tel\":\"18702629929\",\"log_status\":1}',NULL);
/*!40000 ALTER TABLE `gd_config` ENABLE KEYS */;

#
# Structure for table "gd_log"
#

DROP TABLE IF EXISTS `gd_log`;
CREATE TABLE `gd_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtext` varchar(50) NOT NULL DEFAULT '' COMMENT '操作内容',
  `time` int(10) unsigned DEFAULT NULL COMMENT '操作时间',
  `uid` char(20) NOT NULL DEFAULT '' COMMENT '外键：操作用户id',
  `ip` char(15) NOT NULL COMMENT 'IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员操作日志';

#
# Data for table "gd_log"
#

/*!40000 ALTER TABLE `gd_log` DISABLE KEYS */;
INSERT INTO `gd_log` VALUES (98,'日志删除',1505975831,'admin','127.0.0.1'),(99,'解锁管理员-edit',1505975876,'admin','127.0.0.1'),(100,'锁定管理员-edit',1505975930,'admin','127.0.0.1'),(101,'解锁管理员-edit',1505975934,'admin','127.0.0.1'),(102,'登录',1505975944,'edit','127.0.0.1'),(103,'登录',1505975959,'admin','127.0.0.1');
/*!40000 ALTER TABLE `gd_log` ENABLE KEYS */;

#
# Structure for table "gd_nav"
#

DROP TABLE IF EXISTS `gd_nav`;
CREATE TABLE `gd_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='菜单表';

#
# Data for table "gd_nav"
#

/*!40000 ALTER TABLE `gd_nav` DISABLE KEYS */;
INSERT INTO `gd_nav` VALUES (1,0,'系统设置','Admin/ShowNav/config','cog',1),(2,1,'菜单管理','Module/Config/nav','',1),(3,1,'系统设置','Module/Config/set','',2),(4,0,'权限控制','Admin/ShowNav/rule','lock',2),(5,4,'权限列表','Module/Rule/rule','',1),(6,1,'系统日志','Module/Config/log','',4),(7,4,'用户组管理','Module/Rule/group','',2),(8,4,'管理员列表','Module/Rule/admin','',3);
/*!40000 ALTER TABLE `gd_nav` ENABLE KEYS */;
