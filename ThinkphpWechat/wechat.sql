# Host: 104.224.129.95  (Version: 5.5.56-log)
# Date: 2017-08-28 10:51:07
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "hd_base_system"
#

DROP TABLE IF EXISTS `hd_base_system`;
CREATE TABLE `hd_base_system` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `welcome` varchar(200) DEFAULT NULL,
  `default` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='关注和默认回复消息';

#
# Data for table "hd_base_system"
#

INSERT INTO `hd_base_system` VALUES (1,'欢迎你关注','相关信息不存在！');

#
# Structure for table "hd_button_data"
#

DROP TABLE IF EXISTS `hd_button_data`;
CREATE TABLE `hd_button_data` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `data` text,
  `title` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

#
# Data for table "hd_button_data"
#

INSERT INTO `hd_button_data` VALUES (8,'{\"button\":[{\"type\":\"view\",\"name\":\"九幽博客\",\"key\":\"\",\"url\":\"http://wp.itnetve.top\"}]}','博客',0),(9,'{\"button\":[{\"type\":\"view\",\"name\":\"视频\",\"key\":\"\",\"sub_button\":[{\"type\":\"view\",\"name\":\"PHP\",\"key\":\"\",\"url\":\"http://php.net\"},{\"type\":\"view\",\"name\":\"LINUX\",\"key\":\"\",\"url\":\"http://linux.com\"}]},{\"type\":\"view\",\"name\":\"百度\",\"key\":\"\",\"url\":\"http://www.baidu.com\"},{\"type\":\"click\",\"name\":\"逆战\",\"key\":\"华为\",\"url\":\"http://nz.qq.com\"}]}','活动营销',1);

#
# Structure for table "hd_config"
#

DROP TABLE IF EXISTS `hd_config`;
CREATE TABLE `hd_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `system` text COMMENT '网站配置',
  `wechat` text COMMENT '微信配置',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='网站和微信配置';

#
# Data for table "hd_config"
#

INSERT INTO `hd_config` VALUES (1,'{\"webname\":\"Wechat\",\"icp\":\"粤ICP备 8898922\",\"tel\":\"基于ThinkPHP3.2.3\"}','{\"token\":\"houdunren\",\"appid\":\"wx0c27539566ca10a6\",\"appsecret\":\"1338ade3704d3df3998ed9764c741d3e\"}');

#
# Structure for table "hd_keyword"
#

DROP TABLE IF EXISTS `hd_keyword`;
CREATE TABLE `hd_keyword` (
  `rid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(20) DEFAULT NULL COMMENT '关键词内容',
  `module` varchar(20) DEFAULT NULL COMMENT '模块的标识',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "hd_keyword"
#

INSERT INTO `hd_keyword` VALUES (1,'hd','Text'),(2,'华为','Text'),(3,'小米','Text');

#
# Structure for table "hd_module"
#

DROP TABLE IF EXISTS `hd_module`;
CREATE TABLE `hd_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '模块名称',
  `name` varchar(30) DEFAULT NULL COMMENT '模块标识',
  `actions` text COMMENT '动作',
  `message` tinyint(1) DEFAULT NULL COMMENT '是否处理微信消息',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='模块数据表（已经安装)';

#
# Data for table "hd_module"
#

INSERT INTO `hd_module` VALUES (48,'基本功能','base','[{\"title\":\"系统回复\",\"name\":\"system\"}]',0),(50,'文本回复','text','[]',1),(52,'微信菜单','button','[{\"title\":\"菜单设计\",\"name\":\"lists\"}]',0),(59,'微官网','news','[{\"title\":\"栏目管理\",\"name\":\"category\"},{\"title\":\"\\n文章管理\",\"name\":\"article\"}]',0);

#
# Structure for table "hd_news_article"
#

DROP TABLE IF EXISTS `hd_news_article`;
CREATE TABLE `hd_news_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `click` mediumint(9) DEFAULT NULL,
  `content` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "hd_news_article"
#

INSERT INTO `hd_news_article` VALUES (6,'哈哈',11,'<p>手动阀</p>');

#
# Structure for table "hd_news_category"
#

DROP TABLE IF EXISTS `hd_news_category`;
CREATE TABLE `hd_news_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "hd_news_category"
#

INSERT INTO `hd_news_category` VALUES (1,'新闻'),(2,'游戏 地方');

#
# Structure for table "hd_text_contents"
#

DROP TABLE IF EXISTS `hd_text_contents`;
CREATE TABLE `hd_text_contents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL COMMENT '回复内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "hd_text_contents"
#

INSERT INTO `hd_text_contents` VALUES (1,1,'后盾人，人人做后盾qqqq'),(2,2,'华为是中国产品'),(3,3,'小米老板是雷军');
