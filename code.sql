# Host: localhost  (Version: 5.5.53)
# Date: 2017-07-06 23:44:28
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "card_address"
#

DROP TABLE IF EXISTS `card_address`;
CREATE TABLE `card_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '父级ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` varchar(1) NOT NULL DEFAULT '男' COMMENT '性别',
  `birthday` int(11) NOT NULL COMMENT '出生日期',
  `id_card` bigint(18) NOT NULL COMMENT '身份证号码',
  `phone` varchar(20) NOT NULL DEFAULT '0' COMMENT '手机号码',
  `weixin` varchar(255) NOT NULL DEFAULT '' COMMENT '微信号',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT '邮箱',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '住址',
  `avatar` varchar(255) NOT NULL DEFAULT '' COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='通讯簿';

#
# Data for table "card_address"
#

/*!40000 ALTER TABLE `card_address` DISABLE KEYS */;
INSERT INTO `card_address` VALUES (2,32,'刘娟','女',734198400,362421199304081726,'13527910425','','','',''),(3,32,'刘隆检','男',792518400,362421199502121717,'18702629929','jiuyou95','jian34long@163.com','东莞虎门',''),(4,35,'陈仁焕','男',795456000,362421199503188331,'18702531167','','','',''),(5,35,'胡俊林','男',796147200,362421199503265018,'13407962024','','','',''),(6,32,'刘茂华','男',-20419200,362421196905101717,'13631740865','','','',''),(7,35,'李先福','男',777484800,362421199408221738,'13479661915','','','',''),(8,36,'徐方明','男',367344000,362321198108238116,'18925468086','','','',''),(9,32,'谢桂妹','女',21052800,362421197009021721,'15876465094','','','',''),(10,34,'肖珊','女',801417600,362204199505265129,'15279105210','','','',''),(11,33,'谢世良','男',348940800,362421198101222010,'13724236707','','','',''),(12,35,'肖正亮','男',783619200,362421199411010819,'18770794610','','','',''),(13,36,'尤鲜红','女',353347200,362323198103148122,'','','','',''),(14,34,'张亮','男',730396800,360428199302235114,'18702531411','','','',''),(15,35,'钟亮','男',755625600,36242119931212831,'187 0253 0722','','','','');
/*!40000 ALTER TABLE `card_address` ENABLE KEYS */;

#
# Structure for table "card_admin"
#

DROP TABLE IF EXISTS `card_admin`;
CREATE TABLE `card_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `avatar` varchar(255) NOT NULL COMMENT '用户头像，相对于upload/avatar目录',
  `password` char(32) NOT NULL COMMENT '密码',
  `phone` bigint(11) NOT NULL COMMENT '手机号码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '登录邮箱',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '住址',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '用户状态 3：锁定； 1：正常 ；2：未验证',
  `regtime` int(11) NOT NULL COMMENT '注册时间',
  `loginip` varchar(20) NOT NULL COMMENT '最近一次登陆ip',
  `logintime` int(11) NOT NULL COMMENT '最近一次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户表';

#
# Data for table "card_admin"
#

/*!40000 ALTER TABLE `card_admin` DISABLE KEYS */;
INSERT INTO `card_admin` VALUES (1,'admin','九幽','','b7a1b6d08af8f9fbc5c009889bb4b165',18702629929,'jian34long@163.com','中国广东',1,1497332555,'127.0.0.1',1499347231),(4,'JIUYOU','游帝','','d41d8cd98f00b204e9800998ecf8427e',110,'1547560934@qq.com','',3,1498531975,'127.0.0.1',1498715320);
/*!40000 ALTER TABLE `card_admin` ENABLE KEYS */;

#
# Structure for table "card_auth_group"
#

DROP TABLE IF EXISTS `card_auth_group`;
CREATE TABLE `card_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '分组名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '权限',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户组表';

#
# Data for table "card_auth_group"
#

/*!40000 ALTER TABLE `card_auth_group` DISABLE KEYS */;
INSERT INTO `card_auth_group` VALUES (1,'管理员',1,'1,2,4,5,6,7,8,9,24,3,10,11,12,13,14,20,21,22,23,15'),(3,'编辑',1,'1,25,2,4,34,29,30,31,32');
/*!40000 ALTER TABLE `card_auth_group` ENABLE KEYS */;

#
# Structure for table "card_auth_group_access"
#

DROP TABLE IF EXISTS `card_auth_group_access`;
CREATE TABLE `card_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `group_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户组ID',
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户和组对应关系表';

#
# Data for table "card_auth_group_access"
#

/*!40000 ALTER TABLE `card_auth_group_access` DISABLE KEYS */;
INSERT INTO `card_auth_group_access` VALUES (4,3);
/*!40000 ALTER TABLE `card_auth_group_access` ENABLE KEYS */;

#
# Structure for table "card_auth_rule"
#

DROP TABLE IF EXISTS `card_auth_rule`;
CREATE TABLE `card_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `name` char(80) NOT NULL DEFAULT '' COMMENT '地址路径',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '规则名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='规则表';

#
# Data for table "card_auth_rule"
#

/*!40000 ALTER TABLE `card_auth_rule` DISABLE KEYS */;
INSERT INTO `card_auth_rule` VALUES (1,0,'Admin/Index/index','后台首页',1,1,''),(2,0,'Admin/ShowNav/config','系统设置',1,1,''),(3,0,'Admin/ShowNav/rule','权限控制',1,1,''),(4,2,'Admin/Nav/index','菜单管理',1,1,''),(6,4,'Admin/Nav/add','添加菜单',1,1,''),(7,4,'Admin/Nav/edit','修改菜单',1,1,''),(8,4,'Admin/Nav/delete','删除菜单',1,1,''),(9,4,'Admin/Nav/order','菜单排序',1,1,''),(10,3,'Admin/Rule/index','权限管理',1,1,''),(11,10,'Admin/Rule/add','添加权限',1,1,''),(12,10,'Admin/Rule/edit','修改权限',1,1,''),(13,10,'Admin/Rule/delete','删除权限',1,1,''),(14,3,'Admin/Rule/group','用户组管理',1,1,''),(15,3,'Admin/Rule/admin_user_list','管理员列表',1,1,''),(20,14,'Admin/Rule/add_group','添加用户组',1,1,''),(21,14,'Admin/Rule/edit_group','修改用户组',1,1,''),(22,14,'Admin/Rule/delete_group','删除用户组',1,1,''),(23,14,'Admin/Rule/rule_group','分配权限',1,1,''),(24,2,'Admin/Config/index','系统设置',1,1,''),(25,1,'Admin/Index/Welcome','欢迎页面',1,1,''),(26,24,'Admin/Config/add','配置新增',1,1,''),(27,24,'Admin/Config/edit','配置更新',1,1,''),(29,0,'Admin/ShowNav/user','个人中心',1,1,''),(30,29,'Admin/User/index','基本资料',1,1,''),(31,30,'Admin/User/avatar','头像更新',1,1,''),(32,30,'Admin/User/edit_password','密码更新',1,1,''),(33,2,'Admin/Config/log','系统日志',1,1,''),(34,33,'Admin/Config/add_log','日志写入',1,1,''),(35,33,'Admin/Config/alldel','日志删除',1,1,''),(36,29,'Admin/User/address','通讯录',1,1,'');
/*!40000 ALTER TABLE `card_auth_rule` ENABLE KEYS */;

#
# Structure for table "card_config"
#

DROP TABLE IF EXISTS `card_config`;
CREATE TABLE `card_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `configname` varchar(60) NOT NULL COMMENT '配置名称',
  `info` varchar(255) NOT NULL COMMENT '配置说明',
  `content` text NOT NULL COMMENT '详细内容',
  `type` varchar(255) NOT NULL COMMENT '配置类型',
  `optime` int(11) NOT NULL DEFAULT '0' COMMENT '管理员操作时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='系统设置';

#
# Data for table "card_config"
#

/*!40000 ALTER TABLE `card_config` DISABLE KEYS */;
INSERT INTO `card_config` VALUES (1,'cfg_name','网站名称','Code Help','string',1498630164),(2,'cfg_keywords','网站关键字','内容管理系统','string',1498630164),(3,'cfg_description','网站描述','这是基于Auth权限的管理系统','bstring',0),(4,'cfg_powerby','网站底部版权','CopyRight © 2016 九幽IT 版权所有 粤ICP备16060013号-1','string',1498630164),(5,'cfg_log','网站后台操作日志','Y','bool',1497843844),(6,'cfg_url','网站地址','http://code.itnetve.top','string',1498630164),(7,'cfg_verify','登录验证码','N','bool',1498630164),(8,'cfg_prefix','SESSION前缀','PzSEa7038A_','string',1498630164);
/*!40000 ALTER TABLE `card_config` ENABLE KEYS */;

#
# Structure for table "card_font"
#

DROP TABLE IF EXISTS `card_font`;
CREATE TABLE `card_font` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0',
  `zh_name` varchar(255) NOT NULL DEFAULT '' COMMENT '中文含义',
  `en_name` varchar(255) NOT NULL DEFAULT '' COMMENT '英文显示',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=321 DEFAULT CHARSET=utf8 COMMENT='字体';

#
# Data for table "card_font"
#

/*!40000 ALTER TABLE `card_font` DISABLE KEYS */;
INSERT INTO `card_font` VALUES (1,5,'地址薄','address-book'),(2,5,'地址薄','address-book-o'),(3,5,'地址卡','address-card'),(4,5,'地址卡','address-card-o'),(5,5,'','bandcamp'),(6,5,'浴缸','bath'),(7,5,'浴缸','bathtub'),(8,5,'司机的许可证','drivers-license'),(9,5,'司机的许可证（化名）','drivers-license-o'),(10,5,'','eercast'),(11,5,'打开信封','envelope-open'),(12,5,'打开信封','envelope-open-o'),(13,5,'容易的','etsy'),(14,5,'无码营','free-code-camp'),(15,5,'重力','grav'),(16,5,'握手','handshake-o'),(17,5,'ID徽章','id-badge'),(18,5,'ID卡','id-card'),(19,5,'ID卡','id-card-o'),(20,5,'互联网电影数据库','imdb'),(21,5,'','linode'),(22,5,'Meetup网站','meetup'),(23,5,'微芯片','microchip'),(24,5,'播客','podcast'),(25,5,'','quora'),(26,5,'','ravelry'),(27,5,'','s15'),(28,5,'淋浴','shower'),(29,5,'雪花','snowflake-o'),(30,5,'超级大国','superpowers'),(31,5,'电报','telegram'),(32,5,'温度计','thermometer'),(33,5,'温度计','thermometer-0'),(34,5,'温度计','thermometer-1'),(35,5,'温度计','thermometer-2'),(36,5,'温度计','thermometer-3'),(37,5,'温度计','thermometer-4'),(38,5,'温度计-空','thermometer-empty'),(39,5,'温度计-全','thermometer-full'),(40,5,'温度计-帮助','thermometer-half'),(41,5,'温度计-1/4','thermometer-quarter'),(42,5,'温度计-3/4','thermometer-three-quarters'),(43,5,'次矩形','times-rectangle'),(44,5,'次矩形','times-rectangle-o'),(45,5,'用户界','user-circle'),(46,5,'用户界','user-circle-o'),(47,5,'用户','user-o'),(48,5,'名片','vcard'),(49,5,'名片','vcard-o'),(50,5,'关闭窗口','window-close'),(51,5,'关闭窗口','window-close-o'),(52,5,'窗口最大化','window-maximize'),(53,5,'窗口最小化','window-minimize'),(54,5,'窗口还原','window-restore'),(55,5,'','wpexplorer'),(56,21,'','500px'),(57,21,'','adn'),(58,21,'亚马逊','amazon'),(59,21,'安卓','android'),(60,21,'','angellist'),(61,21,'苹果','apple'),(62,21,'','bandcamp'),(63,21,'','behance'),(64,21,'','behance-square'),(65,21,'位桶','bitbucket'),(66,21,'位桶平方','bitbucket-square'),(67,21,'比特币','bitcoin'),(68,21,'黑领带','black-tie'),(69,22,'救护车','ambulance'),(70,22,'','h-square'),(71,22,'心','heart'),(72,22,'心','heart-o'),(73,22,'心跳','heartbeat'),(74,22,'医院','hospital-o'),(75,22,'急救包','medkit'),(76,22,'加方','plus-square'),(77,22,'听诊器','stethoscope'),(78,22,'用户MD','user-md'),(79,22,'轮椅','wheelchair'),(80,22,'轮椅ALT','wheelchair-alt'),(81,21,'蓝牙','bluetooth'),(82,21,'蓝牙','bluetooth-b'),(83,21,'','btc'),(84,21,'','buysellads'),(85,21,'直流-美国运通','cc-amex'),(86,21,'就餐者俱乐部','cc-diners-club'),(87,21,'发现','cc-discover'),(88,21,'','cc-jcb'),(89,21,'万事达卡','cc-mastercard'),(90,21,'PayPal支付','cc-paypal'),(91,21,'条纹','cc-stripe'),(92,21,'签证','cc-visa'),(93,21,'谷歌浏览器','chrome'),(94,21,'相互依赖','codepen'),(95,21,'','codiepie'),(96,21,'连接建立','connectdevelop'),(97,21,'','contao'),(98,21,'CSS3样式','css3'),(99,21,'短跑的立方体','dashcube'),(100,21,'美味的','delicious'),(101,21,'离经叛道的艺术','deviantart'),(102,21,'掘客','digg'),(103,21,'运球','dribbble'),(104,21,'碉堡箱','dropbox'),(105,21,'内容管理系统','drupal'),(106,21,'优势','edge'),(107,21,'德投','eercast'),(108,21,'帝国','empire'),(109,21,'整个的','envira'),(110,21,'容易的','etsy'),(111,21,'加速SSL','expeditedssl'),(112,21,'','fa'),(113,21,'脸谱网','facebook'),(114,21,'脸谱网','facebook-f'),(115,21,'脸谱网-官方的','facebook-official'),(116,21,'脸谱网-广场','facebook-square'),(117,21,'火狐浏览器','firefox'),(118,21,'一阶','first-order'),(119,21,'相片分享','flickr'),(120,21,'Font-Awesome字体','font-awesome'),(121,21,'字体图标','fonticons'),(122,21,'堡垒','fort-awesome'),(123,21,'论坛的蜜蜂','forumbee'),(124,21,'正方形的','foursquare'),(125,21,'无码营','free-code-camp'),(126,21,'','ge'),(127,21,'把口袋','get-pocket'),(128,21,'','gg'),(129,21,'圆圈','gg-circle'),(130,21,'GIT','git'),(131,21,'直角的git','git-square'),(132,21,'GitHub','github'),(133,21,'GitHub-ALT','github-alt'),(134,21,'正直地GitHub','github-square'),(135,21,'','gitlab'),(136,21,'','gittip'),(137,21,'滑翔','glide'),(138,21,'滑翔','glide-g'),(139,21,'谷歌','google'),(140,21,'谷歌加','google-plus'),(141,21,'谷歌加了一圈','google-plus-circle'),(142,21,'谷歌加官方','google-plus-official'),(143,21,'谷歌联合广场','google-plus-square'),(144,21,'谷歌钱包','google-wallet'),(145,21,'无偿付出','gratipay'),(146,21,'重力','grav'),(147,21,'黑客新闻','hacker-news'),(148,21,'','houzz'),(149,21,'HTML5','html5'),(150,21,'互联网电影数据库','imdb'),(151,21,'一款应用程序','instagram'),(152,21,'互联网-ie','internet-explorer'),(153,21,'','ioxhost'),(154,21,'模板','joomla'),(155,21,'小提琴','jsfiddle'),(156,21,'最后一次调频','lastfm'),(157,21,'方形-最后一次调频','lastfm-square'),(158,21,'','leanpub'),(159,21,'商务化人际关系网','linkedin'),(160,21,'方形-商务化人际关系网','linkedin-square'),(161,21,'','linode'),(162,21,'Linux','linux'),(163,21,'最大的CDN','maxcdn'),(164,21,'平均路径','meanpath'),(165,21,'中等的','medium'),(166,21,'Meetup网站','meetup'),(167,21,'混合云','mixcloud'),(168,21,'','modx'),(169,21,'同班同学','odnoklassniki'),(170,21,'方形-同班同学','odnoklassniki-square'),(171,21,'网店版','opencart'),(172,21,'开放式认证系统','openid'),(173,21,'歌剧','opera'),(174,21,'期权的怪物','optin-monster'),(175,21,'页的线','pagelines'),(176,21,'PayPal支付','paypal'),(177,21,'吹笛手','pied-piper'),(178,21,'吹笛者ALT','pied-piper-alt'),(179,21,'吹笛手的PP','pied-piper-pp'),(180,21,'照片分享网站','pinterest'),(181,21,'照片分享网站','pinterest-p'),(182,21,'方形-照片分享网站','pinterest-square'),(183,21,'产品搜寻','product-hunt'),(184,21,'QQ','qq'),(185,21,'','quora'),(186,21,'','ra'),(187,21,'','ravelry'),(188,21,'背叛','rebel'),(189,21,'红迪网','reddit'),(190,21,'红迪网-外星人','reddit-alien'),(191,21,'红迪网-方形','reddit-square'),(192,21,'人人网','renren'),(193,21,'抵抗','resistance'),(194,21,'游猎','safari'),(195,21,'','scribd'),(196,21,'','sellsy'),(197,21,'分享ALT','share-alt'),(198,21,'方形-分享ALT','share-alt-square'),(199,21,'衬衫散装','shirtsinbulk'),(200,21,'简单的建','simplybuilt'),(201,21,'阿特拉斯的天空','skyatlas'),(202,21,'网络电话','skype'),(203,21,'松弛','slack'),(204,21,'幻灯片分享','slideshare'),(205,21,'快速聊天','snapchat'),(206,21,'即时聊天','snapchat-ghost'),(207,21,'方形-快速聊天','snapchat-square'),(208,21,'云之声','soundcloud'),(209,21,'','spotify'),(210,21,'堆栈交换','stack-exchange'),(211,21,'栈溢出','stack-overflow'),(212,21,'蒸汽','steam'),(213,21,'方形-蒸汽','steam-square'),(214,21,'偶然发现','stumbleupon'),(215,21,'偶然发现圈','stumbleupon-circle'),(216,21,'超级大国','superpowers'),(217,21,'电报','telegram'),(218,21,'腾讯微博','tencent-weibo'),(219,21,'主题岛','themeisle'),(220,21,'','trello'),(221,21,'旅行顾问','tripadvisor'),(222,21,'微博客','tumblr'),(223,21,'方形-微博客','tumblr-square'),(224,21,'抽搐','twitch'),(225,21,'推特','twitter'),(226,21,'方形的推特','twitter-square'),(227,21,'USB接口','usb'),(228,21,'通路引线','viacoin'),(229,21,'','viadeo'),(230,21,'','viadeo-square'),(231,21,'','vimeo'),(232,21,'','vimeo-square'),(233,21,'藤','vine'),(234,21,'','vk'),(235,21,'微信','wechat'),(236,21,'新浪微博','weibo'),(237,21,'微信','weixin'),(238,21,'什么是应用程序','whatsapp'),(239,21,'维基百科','wikipedia-w'),(240,21,'Windows操作系统','windows'),(241,21,'Wordpress主题','wordpress'),(242,21,'WP初学者','wpbeginner'),(243,21,'WP浏览器','wpexplorer'),(244,21,'WP表格','wpforms'),(245,21,'','xing'),(246,21,'','xing-square'),(247,21,'Y-组合','y-combinator'),(248,21,'Y-方形组合','y-combinator-square'),(249,21,'雅虎','yahoo'),(250,21,'','yc'),(251,21,'','yc-square'),(252,21,'兴奋','yelp'),(253,21,'','yoast'),(254,21,'YouTube','youtube'),(255,21,'YouTube上播放','youtube-play'),(256,21,'方块-YouTube','youtube-square'),(257,20,'窗口最大','arrows-alt'),(258,20,'向后的','backward'),(259,20,'窗口缩小','compress'),(260,20,'弹出','eject'),(261,20,'扩大','expand'),(262,20,'快速后退','fast-backward'),(263,20,'快速前进','fast-forward'),(264,20,'向前地','forward'),(265,20,'暂停','pause'),(266,20,'圈暂停','pause-circle'),(267,20,'圈暂停','pause-circle-o'),(268,20,'播放','play'),(269,20,'播放-圈','play-circle'),(270,20,'播放-圈','play-circle-o'),(271,20,'随机','random'),(272,20,'后退一步','step-backward'),(273,20,'向前一步','step-forward'),(274,20,'停止','stop'),(275,20,'停止循环','stop-circle'),(276,20,'停止循环','stop-circle-o'),(277,20,'YouTube播放','youtube-play'),(278,16,'面积图','area-chart'),(279,16,'条形图','bar-chart'),(280,16,'条形图','bar-chart-o'),(281,16,'折线图','line-chart'),(282,16,'饼状图表','pie-chart'),(283,15,'美国运股票交易所','cc-amex'),(284,15,'用餐者俱乐部','cc-diners-club'),(285,15,'发现','cc-discover'),(286,15,'JCB卡','cc-jcb'),(287,15,'万事达信用卡','cc-mastercard'),(288,15,'PayPal支付','cc-paypal'),(289,15,'条纹','cc-stripe'),(290,15,'维萨信用卡','cc-visa'),(291,15,'信用卡','credit-card'),(292,15,'信用卡','credit-card-alt'),(293,15,'谷歌钱包','google-wallet'),(294,15,'PayPal支付','paypal'),(295,14,'检查方形','check-square'),(296,14,'检查方形','check-square-o'),(297,14,'圆圈','circle'),(298,14,'圆圈','circle-o'),(299,14,'点圈','dot-circle-o'),(300,14,'负-方块','minus-square'),(301,14,'负-方块','minus-square-o'),(302,14,'加-方块','plus-square'),(303,14,'加方块','plus-square-o'),(304,14,'方块','square'),(305,14,'方块','square-o'),(306,13,'圆圈-缺口','circle-o-notch'),(307,13,'钝齿','cog'),(308,13,'齿轮','gear'),(309,13,'刷新','refresh'),(310,13,'微调','spinner'),(311,19,'角度双降示例','angle-double-down'),(312,19,'角 - 双左','angle-double-left'),(313,19,'角度双右的','angle-double-right'),(314,19,'角度叠加的','angle-double-up'),(315,19,'角度降低的例子','angle-down'),(316,19,'左角','angle-left'),(317,19,'角右','angle-right'),(318,19,'倾斜','angle-up'),(319,19,'箭头向下的','arrow-circle-down'),(320,19,'箭头 -左','arrow-circle-left'),(321,19,'箭头圆圈向下的示例','arrow-circle-o-down'),(322,19,'箭头 - 左 - 左的','arrow-circle-o-left'),(323,19,'箭头 - 右','arrow-circle-o-right'),(324,19,'箭头向上的','arrow-circle-o-up'),(325,19,'箭头 - 圆圈- 右','arrow-circle-right'),(326,19,'箭头向上的','arrow-circle-up'),(327,19,'箭头向下的','arrow-down'),(328,19,'左箭头','arrow-left'),(329,19,'箭头右侧','arrow-right'),(330,19,'箭头上','arrow-up'),(331,19,'箭头','arrows'),(332,19,'箭头alt','arrows-alt'),(333,19,'箭头横向','arrows-h'),(334,19,'箭头纵向','arrows-v'),(335,19,'插入符号向下','caret-down'),(336,19,'插入符号左侧的','caret-left'),(337,19,'箭头符号右侧','caret-right'),(338,19,'插入符向上','caret-up'),(339,19,'插入符号向下的','caret-square-o-down'),(340,19,'插入符号左侧的示例','caret-square-o-left'),(341,19,'插入符号右对齐的','caret-square-o-right'),(342,19,'插入符号上侧','caret-square-o-up'),(343,19,'人字形向下的','chevron-circle-down'),(344,19,'V形圆的左','chevron-circle-left'),(345,19,'V形圈右的','chevron-circle-right'),(346,19,'人字形向上的','chevron-circle-up'),(347,19,'雪佛龙的下','chevron-down'),(348,19,'雪佛龙左的','chevron-left'),(349,19,'雪佛龙右的','chevron-right'),(350,19,'雪佛龙上的','chevron-up'),(351,19,'双向','exchange'),(352,19,'手动下拉','hand-o-down'),(353,19,'左手的','hand-o-left'),(354,19,'右手的','hand-o-right'),(355,19,'手指向上','hand-o-up'),(356,19,'向下箭头','long-arrow-down'),(357,19,'向左箭头','long-arrow-left'),(358,19,'向右箭头','long-arrow-right'),(359,19,'向上箭头','long-arrow-up'),(360,19,'切换-下','toggle-down'),(361,19,'切换-左','toggle-left'),(362,19,'切换-右','toggle-right'),(363,19,'切换-上','toggle-up'),(364,18,'对齐中心','align-center'),(365,18,'对齐的','align-justify'),(366,18,'对齐左边的','align-left'),(367,18,'对齐右的','align-right'),(368,18,'粗体','bold'),(369,18,'链接','chain'),(370,18,'取消链接','chain-broken'),(371,18,'剪贴板','clipboard'),(372,18,'列','columns'),(373,18,'复制','copy'),(374,18,'剪切','cut'),(375,18,'向左缩进','dedent'),(376,18,'向左缩进','outdent'),(377,18,'橡皮擦的','eraser'),(378,18,'文件','file'),(379,18,'文件-空白','file-o'),(380,18,'text文件','file-text'),(381,18,'空白的text文件','file-text-o'),(382,18,'文件夹','files-o'),(383,18,'软盘','floppy-o'),(384,18,'字体','font'),(385,18,'标题','header'),(386,18,'缩进','indent'),(387,18,'斜体','italic'),(388,18,'链接','link'),(389,18,'列表','list'),(390,18,'列表','list-alt'),(391,18,'数字列表','list-ol'),(392,18,'ul列表','list-ul'),(393,18,'回形针','paperclip'),(394,18,'段落','paragraph'),(395,18,'粘贴','paste'),(396,18,'重复','repeat'),(397,18,'旋转左','rotate-left'),(398,18,'旋转右','rotate-right'),(399,18,'保存','save'),(400,18,'剪刀','scissors'),(401,18,'删除线的','strikethrough'),(402,18,'下标','subscript'),(403,18,'上标','superscript'),(404,18,'表格','table'),(405,18,'文本高度','text-height'),(406,18,'文本宽度','text-width'),(407,18,'表格的th','th'),(408,18,'大型的','th-large'),(409,18,'列表','th-list'),(410,18,'下划线','underline'),(411,18,'撤销','undo'),(412,18,'取消链接','unlink'),(413,17,'比特币','bitcoin'),(414,17,'BTC','btc'),(415,17,'人民币','cny'),(416,17,'美元','dollar'),(417,17,'','eur'),(418,17,'欧元','euro'),(419,17,'','gbp'),(420,17,'','gg'),(421,17,'','gg-circle'),(422,17,'','ils'),(423,17,'','inr'),(424,17,'','jpy'),(425,17,'','krw'),(426,17,'','money'),(427,17,'人民币','rmb'),(428,17,'卢布','rouble'),(429,17,'','rub'),(430,17,'卢布','ruble'),(431,17,'卢比','rupee'),(432,17,'','shekel'),(433,17,'','sheqel'),(434,17,'','try'),(435,17,'土耳其里拉','turkish-lira'),(436,17,'','usd'),(437,17,'','won'),(438,17,'日元','yen'),(439,12,'文件','file'),(440,12,'文件存档','file-archive-o'),(441,12,'音频文件','file-audio-o'),(442,12,'代码文件','file-code-o'),(443,12,'excel文件','file-excel-o'),(444,12,'图片文件','file-image-o'),(445,12,'电影文件','file-movie-o'),(446,12,'空白文件','file-o'),(447,12,'pdf文件','file-pdf-o'),(448,12,'图片文件','file-photo-o'),(449,12,'图片文件','file-picture-o'),(450,12,'ppt文件','file-powerpoint-o'),(451,12,'声音文件','file-sound-o'),(452,12,'text文件','file-text'),(453,12,'空白的text文件','file-text-o'),(454,12,'视频文件','file-video-o'),(455,12,'word文件','file-word-o'),(456,12,'zip文件','file-zip-o'),(457,10,'无性别','genderless'),(458,10,'阴阳人','intersex'),(459,10,'火星人','mars'),(460,10,'两个火星人','mars-double'),(461,10,'','mars-stroke'),(462,10,'','mars-stroke-h'),(463,10,'','mars-stroke-v'),(464,10,'水星人','mercury'),(465,10,'中性','neuter'),(466,10,'变性人','transgender'),(467,10,'变性人-alt','transgender-alt'),(468,10,'金星','venus'),(469,10,'双金星','venus-double'),(470,10,'火星金星','venus-mars'),(471,9,'救护车','ambulance'),(472,9,'汽车','automobile'),(473,9,'自行车','bicycle'),(474,9,'巴士','bus'),(475,9,'驾驶室','cab'),(476,9,'汽车','car'),(477,9,'战斗机','fighter-jet'),(478,9,'摩托车','motorcycle'),(479,9,'飞机','plane'),(480,9,'火箭','rocket'),(481,9,'船舶','ship'),(482,9,'航天飞机','space-shuttle'),(483,9,'地铁','subway'),(484,9,'出租车','taxi'),(485,9,'列车','train'),(486,9,'卡车','truck'),(487,9,'轮椅','wheelchair'),(488,9,'','wheelchair-alt'),(489,8,'手抓','hand-grab-o'),(490,8,'手蜥蜴的','hand-lizard-o'),(491,8,'指下','hand-o-down'),(492,8,'指左','hand-o-left'),(493,8,'指右','hand-o-right'),(494,8,'指上','hand-o-up'),(495,8,'手掌','hand-paper-o'),(496,8,'好的','hand-peace-o'),(497,8,'手指u','hand-pointer-o'),(498,8,'拳头','hand-rock-o'),(499,8,'剪刀','hand-scissors-o'),(500,8,'手指猫','hand-spock-o'),(501,8,'手掌','hand-stop-o'),(502,8,'大拇指向下','thumbs-down'),(503,8,'大拇指向下','thumbs-o-down'),(504,8,'大拇指向上','thumbs-o-up'),(505,8,'大拇指向上','thumbs-up'),(506,7,'美国口语翻译','american-sign-language-interpreting'),(507,7,'美国口语翻译','asl-interpreting'),(508,7,'辅助听力系统','assistive-listening-systems'),(509,7,'音频描述','audio-description'),(510,7,'失明的','blind'),(511,7,'盲文','braille'),(512,7,'','cc'),(513,7,'聋哑','deaf'),(514,7,'耳聋','deafness'),(515,7,'硬的听力','hard-of-hearing'),(516,7,'低视力','low-vision'),(517,7,'问题','question-circle-o'),(518,7,'手语','sign-language'),(519,7,'签名','signing'),(520,7,'','tty'),(521,7,'通用访问','universal-access'),(522,7,'音量控制电话','volume-control-phone'),(523,7,'轮椅','wheelchair'),(524,7,'轮椅','wheelchair-alt');
/*!40000 ALTER TABLE `card_font` ENABLE KEYS */;

#
# Structure for table "card_log"
#

DROP TABLE IF EXISTS `card_log`;
CREATE TABLE `card_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logtext` varchar(50) NOT NULL DEFAULT '' COMMENT '操作内容',
  `time` int(10) unsigned DEFAULT NULL COMMENT '操作时间',
  `uid` char(20) NOT NULL DEFAULT '' COMMENT '外键：操作用户id',
  `ip` char(15) NOT NULL COMMENT 'IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=784 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员操作日志';

#
# Data for table "card_log"
#

/*!40000 ALTER TABLE `card_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_log` ENABLE KEYS */;

#
# Structure for table "card_nav"
#

DROP TABLE IF EXISTS `card_nav`;
CREATE TABLE `card_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '菜单表',
  `pid` int(11) unsigned DEFAULT '0' COMMENT '所属菜单',
  `name` varchar(15) DEFAULT '' COMMENT '菜单名称',
  `mca` varchar(255) DEFAULT '' COMMENT '模块、控制器、方法',
  `ico` varchar(20) DEFAULT '' COMMENT 'font-awesome图标',
  `order_number` int(11) unsigned DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='菜单表';

#
# Data for table "card_nav"
#

/*!40000 ALTER TABLE `card_nav` DISABLE KEYS */;
INSERT INTO `card_nav` VALUES (1,0,'系统设置','Admin/ShowNav/config','cog',2),(2,1,'菜单管理','Admin/Nav/index','',1),(3,0,'权限控制','Admin/ShowNav/rule','expeditedssl',3),(4,3,'权限管理','Admin/Rule/index','',1),(5,3,'用户组管理','Admin/Rule/group','',2),(6,3,'管理员列表','Admin/Rule/admin_user_list','',3),(9,1,'系统设置','Admin/Config/index','',2),(13,1,'系统日志','Admin/Config/log','',4),(15,0,'个人中心','Admin/ShowNav/user','user',1),(16,15,'基本资料','Admin/User/index','',NULL),(17,0,'前端资料','Admin/ShowNav/front','html5',4),(18,17,'图标字体','Admin/Front/font','',1),(19,1,'分类列表','Admin/Config/type','',3),(20,15,'通讯录','Admin/User/address','',NULL);
/*!40000 ALTER TABLE `card_nav` ENABLE KEYS */;

#
# Structure for table "card_type"
#

DROP TABLE IF EXISTS `card_type`;
CREATE TABLE `card_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='分类表';

#
# Data for table "card_type"
#

/*!40000 ALTER TABLE `card_type` DISABLE KEYS */;
INSERT INTO `card_type` VALUES (1,0,'图标字体','',1),(3,1,'Font Awesome','http://fontawesome.dashgame.com/',1),(4,1,'Bootstarp设计','http://www.bootcss.com/p/font-awesome',2),(5,3,'4.7.0版新增41个全新的图标','',0),(6,3,'网页','',0),(7,3,'辅助功能','',0),(8,3,'手势','',0),(9,3,'运输','',0),(10,3,'性别','',0),(12,3,'文件类型','',0),(13,3,'可旋转','',0),(14,3,'表单','',0),(15,3,'支付','',0),(16,3,'图表','',0),(17,3,'货币','',0),(18,3,'文本编辑','',0),(19,3,'指示方向','',0),(20,3,'视频播放','',0),(21,3,'标志','',0),(22,3,'医疗','',0),(23,1,'Glyphicons','http://glyphicons.com/',3),(24,4,'3.0 版本中新增的图标','',0),(25,4,'适合 Web 应用的图标','',0),(26,4,'文本编辑器图标','',0),(27,4,'指示方向的图标','',0),(28,4,'视频播放器图标','',0),(29,4,'SNS图标','',0),(30,4,'医疗图标','',0),(31,0,'通讯录','',0),(32,31,'家族X','',0),(33,31,'家族Y','',0),(34,31,'同学','',0),(35,31,'朋友','',0),(36,31,'同事','',0);
/*!40000 ALTER TABLE `card_type` ENABLE KEYS */;
