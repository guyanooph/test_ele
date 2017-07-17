/*
SQLyog Ultimate v12.3.3 (64 bit)
MySQL - 10.1.13-MariaDB : Database - test_ele
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`test_ele` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `test_ele`;

/*Table structure for table `admin_com` */

DROP TABLE IF EXISTS `admin_com`;

CREATE TABLE `admin_com` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `complain_id` varchar(32) DEFAULT NULL,
  `firm` varchar(10) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `result` varchar(60) DEFAULT NULL,
  `uid` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_com` */

/*Table structure for table `admin_node` */

DROP TABLE IF EXISTS `admin_node`;

CREATE TABLE `admin_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `method` varchar(8) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_node` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `admin_node` */

insert  into `admin_node`(`id`,`name`,`method`,`url`,`state`,`created_at`,`updated_at`) values 
(1,'删除会员','del','user',1,'2017-06-15 13:17:07','2017-06-04 13:17:17'),
(12,'添加会员','get','admin/user/create',1,'2017-07-03 11:24:55',NULL),
(16,'修改会员信息','get','admin/user/edit',1,'2017-07-03 14:51:58',NULL);

/*Table structure for table `admin_num` */

DROP TABLE IF EXISTS `admin_num`;

CREATE TABLE `admin_num` (
  `id` int(11) NOT NULL,
  `newuser` varchar(6) DEFAULT NULL,
  `newshop` varchar(6) DEFAULT NULL,
  `vinum` varchar(8) DEFAULT NULL,
  `tounum` varchar(6) DEFAULT NULL,
  `dannum` varchar(6) DEFAULT NULL,
  `paynum` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_num` */

/*Table structure for table `admin_offer` */

DROP TABLE IF EXISTS `admin_offer`;

CREATE TABLE `admin_offer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `addtime` varchar(12) DEFAULT NULL,
  `uip` varchar(5) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_offer` */

/*Table structure for table `admin_role` */

DROP TABLE IF EXISTS `admin_role`;

CREATE TABLE `admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(16) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `admin_role` */

insert  into `admin_role`(`id`,`role`,`status`,`created_at`,`updated_at`) values 
(27,'老二',1,'2017-07-03 10:38:49',NULL),
(28,'老三',1,'2017-07-03 10:39:05',NULL);

/*Table structure for table `admin_root` */

DROP TABLE IF EXISTS `admin_root`;

CREATE TABLE `admin_root` (
  `id` int(11) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `logtime` timestamp NULL DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `admin_root` */

insert  into `admin_root`(`id`,`name`,`password`,`role`,`logtime`,`addtime`) values 
(1,'root','root','超级管理员','2017-07-07 06:37:28','2017-06-28 00:00:00');

/*Table structure for table `admin_user` */

DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `name` varchar(16) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `logtime` timestamp NULL DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_user` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `admin_user` */

insert  into `admin_user`(`name`,`id`,`password`,`picname`,`phone`,`role`,`logtime`,`addtime`,`updated_at`,`deleted_at`) values 
('张三',4,'13161953642','d36c6992556188a440ec0e92f2548fcf.jpg',NULL,NULL,NULL,'2017-07-06 16:36:33',NULL,NULL),
('刘登辉',5,'eyJpdiI6InFiSlFDMTByTFJSeFBLZTdnUnJsS3c9PSIsInZhbHVlIjoicGd1XC9QMm9YVGVOblArNGR4YVhGXC9BPT0iLCJtYWMiOiJmZGFiYWI4ZjkzODllY2NmZWNiMTQ0OTMxNjMxOTIxYWYzNzNjY2IyNjg1NmY3MWE1MGY0OTVjMzg1NzdhMDA4In0=','8098a9a3854e64e06d039b6401b18929.jpg','13161953642',NULL,NULL,'2017-07-06 16:39:58',NULL,NULL),
('李四',8,'eyJpdiI6IjRkZzdYODAzZjhSTno4WThiY0Rpa0E9PSIsInZhbHVlIjoiVkw2dUhqXC9DTTM2YjdcL1VBdFA0b1VRPT0iLCJtYWMiOiI3ZTVlNzYxNzQ0YzRhZjFjNDQ0ZDAxZDlmNzkyMzQzNjVjNWQ2NWNiYWI0MzM4MmI3NzczNmM2ZTQ5ZDMyOTAzIn0=','4681819b8316eff1b41c9bc768355b1a.jpg','13161659411',NULL,NULL,'2017-07-06 16:46:44',NULL,NULL),
('王五',10,'eyJpdiI6IldLWlpNb2xVQ295WHB0XC9NM0tvSVh3PT0iLCJ2YWx1ZSI6Im9wNDBJZzhObHRxSkxtTjV6TzFnK1E9PSIsIm1hYyI6IjIwMTQ4MzM4MDVmYWUyNjRhNTRkYWZhMDA3MWU3MzJmYWU2Y2IwNTc3ZWM5NGEwMDNkZjMwYTdhZjhiNDA1NDIifQ==','f48dbaf3a8db455b96610baea7d9f120.jpg','1949494949',NULL,NULL,'2017-07-06 16:47:32',NULL,NULL),
('赵六',11,'eyJpdiI6ImZMTERjbTdwRHJ0Zm5acEhDOEpsRmc9PSIsInZhbHVlIjoiS2lNZ01CWU1qcXJ2SGpJYkZBVWVYUT09IiwibWFjIjoiMWQ2MDhlOWFiZDgyYWQwYWU1ZWQxNWRiYzEwMGQ1NTYxMTk5MmRmNjVjYTc1ZGE5NDdhYTU4NDY0OTk2NTU0NCJ9','ce405a302bcf1be476869ae90742e42c.jpg','13245678911',NULL,NULL,'2017-07-06 16:50:15',NULL,NULL),
('王八',12,'eyJpdiI6IkNYeDFmM0ZPcjhjOFFOaFdlWTYrWUE9PSIsInZhbHVlIjoicTBPZFBYcUN3WUZweThLZWFkaXJMdz09IiwibWFjIjoiNGMwNTg2YjQxNmQyNmU1NzdhOTFlZTY4MzhlOTAyNjMwMDJjMjIwMjFmY2U3ZDg0NDAzYjY0OGFjZGNhZDdlNyJ9','583fae187a896fbaf472f603d7508754.jpg','1235285258',NULL,NULL,'2017-07-06 16:56:28',NULL,NULL);

/*Table structure for table `collect` */

DROP TABLE IF EXISTS `collect`;

CREATE TABLE `collect` (
  `id` varchar(6) NOT NULL,
  `userid` varchar(6) DEFAULT NULL,
  `shopid` varchar(6) DEFAULT NULL,
  `create_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `collect` */

/*Table structure for table `delivery_address` */

DROP TABLE IF EXISTS `delivery_address`;

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL COMMENT '收货地址表',
  `userid` int(11) DEFAULT NULL,
  `name` varchar(16) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `other_phone` varchar(11) DEFAULT NULL,
  `position` varchar(15) DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `delivery_address` */

/*Table structure for table `evaluate` */

DROP TABLE IF EXISTS `evaluate`;

CREATE TABLE `evaluate` (
  `id` int(11) NOT NULL,
  `shopid` int(11) NOT NULL COMMENT '商户id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `orderid` int(11) NOT NULL COMMENT '订单id',
  `anonymous` char(1) NOT NULL DEFAULT '1',
  `content` varchar(255) NOT NULL COMMENT '评论内容',
  `shopg_rate` tinyint(1) NOT NULL COMMENT '对商户的评星',
  `shop_content` varchar(255) NOT NULL COMMENT '商户回复的内容',
  `service_time` int(11) NOT NULL COMMENT '订单送达的时间（外键）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:可见；2：不可见',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '评论创建时间',
  PRIMARY KEY (`id`),
  KEY `商户id` (`shopid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `evaluate` */

/*Table structure for table `food` */

DROP TABLE IF EXISTS `food`;

CREATE TABLE `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `title` varchar(16) DEFAULT NULL,
  `picname` varchar(20) DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `foodrate` float(3,2) DEFAULT NULL,
  `norms` char(1) DEFAULT NULL,
  `stutas` tinyint(1) DEFAULT NULL,
  `create_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `food` */

/*Table structure for table `food_eva` */

DROP TABLE IF EXISTS `food_eva`;

CREATE TABLE `food_eva` (
  `id` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `rate` tinyint(1) DEFAULT NULL COMMENT '评星',
  `content` varchar(255) DEFAULT NULL COMMENT '评论内容',
  PRIMARY KEY (`id`),
  KEY `shop` (`shopid`),
  KEY `user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `food_eva` */

/*Table structure for table `food_standard` */

DROP TABLE IF EXISTS `food_standard`;

CREATE TABLE `food_standard` (
  `id` varchar(6) NOT NULL,
  `norms` varchar(10) DEFAULT NULL,
  `shopid` varchar(6) DEFAULT NULL,
  `foodid` varchar(6) DEFAULT NULL,
  `pfice` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `food_standard` */

/*Table structure for table `food_type` */

DROP TABLE IF EXISTS `food_type`;

CREATE TABLE `food_type` (
  `id` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '种类名称',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `shop` (`shopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `food_type` */

/*Table structure for table `location` */

DROP TABLE IF EXISTS `location`;

CREATE TABLE `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址描述',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '位置方位',
  `longitude` float DEFAULT NULL COMMENT '经度',
  `latitude` float DEFAULT NULL COMMENT '经度',
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属城市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `location` */

/*Table structure for table `login_user` */

DROP TABLE IF EXISTS `login_user`;

CREATE TABLE `login_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id ',
  `username` varchar(16) DEFAULT NULL COMMENT '用户名',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `phone` char(11) DEFAULT NULL COMMENT '手机',
  `password` varchar(18) DEFAULT NULL COMMENT '密码',
  `status` tinyint(1) DEFAULT NULL,
  `last_login_time` timestamp NULL DEFAULT NULL COMMENT '登陆时间',
  `last_ip` varchar(15) DEFAULT NULL COMMENT '登陆ip',
  PRIMARY KEY (`id`),
  KEY `uid` (`userid`),
  KEY `use` (`username`),
  KEY `mal` (`email`),
  KEY `poe` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `login_user` */

insert  into `login_user`(`id`,`userid`,`username`,`email`,`phone`,`password`,`status`,`last_login_time`,`last_ip`) values 
(1,2,'刘登辉','1247720900@qq.com','110',NULL,NULL,'2017-06-08 16:58:29',NULL);

/*Table structure for table `mer_login` */

DROP TABLE IF EXISTS `mer_login`;

CREATE TABLE `mer_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL,
  `shopname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商店账户',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电话',
  `email` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `password` varchar(18) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `last_login_time` date DEFAULT NULL COMMENT '上次登陆时间',
  `last_login_ip` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT '上次登陆IP',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mer_login` */

/*Table structure for table `mer_mid` */

DROP TABLE IF EXISTS `mer_mid`;

CREATE TABLE `mer_mid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mer_mid` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

/*Data for the table `mer_mid` */

insert  into `mer_mid`(`id`,`title`,`created_at`,`status`) values 
(14,'ityuthfnbh','2017-06-02 23:46:15',1),
(15,'yutghkj','2017-06-02 23:48:17',0),
(18,'ertyujh','2017-06-02 23:53:19',0),
(19,'45ul','2017-06-02 23:53:56',NULL),
(22,'drhfgkhjk/l','2017-06-03 10:33:36',1),
(23,'yuj','2017-06-03 10:43:59',1);

/*Table structure for table `mer_register` */

DROP TABLE IF EXISTS `mer_register`;

CREATE TABLE `mer_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) DEFAULT NULL COMMENT '商家id',
  `mername` varchar(16) DEFAULT NULL COMMENT '店面账户',
  `password` varchar(18) DEFAULT NULL COMMENT '密码',
  `shoptitle` varchar(16) DEFAULT NULL COMMENT '商家信息',
  `picname` varchar(32) DEFAULT NULL COMMENT '店面照片',
  `license` varchar(32) DEFAULT NULL COMMENT '执照照片',
  `logoname` varchar(5) DEFAULT NULL COMMENT '照片',
  `typeid` varchar(5) DEFAULT NULL COMMENT '店面分类',
  `username` varchar(5) DEFAULT NULL COMMENT '真实姓名',
  `identity` varchar(32) DEFAULT NULL COMMENT '身份证',
  `phone` char(11) DEFAULT NULL COMMENT '电话',
  `city` varchar(32) DEFAULT NULL COMMENT '城市',
  `position` varchar(32) DEFAULT NULL COMMENT '位置方位',
  `longitude_latitude` varchar(40) DEFAULT NULL COMMENT '经纬度',
  `address` varchar(50) DEFAULT NULL COMMENT '详细地址',
  `state` tinyint(1) DEFAULT NULL COMMENT '状态',
  `register_time` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `first_ip` varchar(15) DEFAULT NULL COMMENT '首次登陆ip',
  `first_login_time` timestamp NULL DEFAULT NULL COMMENT '首次登陆时间',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mer_register` */

insert  into `mer_register`(`id`,`shopid`,`mername`,`password`,`shoptitle`,`picname`,`license`,`logoname`,`typeid`,`username`,`identity`,`phone`,`city`,`position`,`longitude_latitude`,`address`,`state`,`register_time`,`first_ip`,`first_login_time`) values 
(1,NULL,'张三的店','456','午夜牛郎会所',NULL,NULL,NULL,'2','张三','4115031993058512','13161953642','北京',NULL,NULL,'银河系太阳系地球中国北京昌平区回龙观',2,'2017-06-06 22:03:45',NULL,'2017-06-19 22:03:50');

/*Table structure for table `mer_sid` */

DROP TABLE IF EXISTS `mer_sid`;

CREATE TABLE `mer_sid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `mid` int(5) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mer_sid` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `mer_sid` */

insert  into `mer_sid`(`id`,`title`,`mid`,`status`,`created_at`,`updated_at`) values 
(1,'小龙虾',3,1,'2017-06-14 16:33:53',NULL),
(2,'小吃',0,NULL,NULL,NULL),
(3,'haohao',16,NULL,'2017-07-07 06:50:23',NULL),
(5,'去去去',14,NULL,'2017-07-07 15:17:53',NULL);

/*Table structure for table `mer_type` */

DROP TABLE IF EXISTS `mer_type`;

CREATE TABLE `mer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类ID',
  `path` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `mer_type` */

/*Table structure for table `merchant` */

DROP TABLE IF EXISTS `merchant`;

CREATE TABLE `merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '商家索引ID',
  `shopname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '商家名字',
  `logo` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'logo图片',
  `rate` float DEFAULT NULL COMMENT '服务评价',
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家地址',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家电话',
  `desc` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家介绍',
  `service_time` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month_num` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `merchant` */

insert  into `merchant`(`id`,`shopid`,`shopname`,`logo`,`rate`,`address`,`phone`,`desc`,`service_time`,`month_num`) values 
(1,2,'烤遍天下',NULL,4.6,'北京市昌平区','12345678901','没有我不能烤的',NULL,NULL),
(2,1,'吃遍天下',NULL,4.5,'北京市昌平区','12345678901','没有我不能吃的',NULL,NULL);

/*Table structure for table `merchant_open` */

DROP TABLE IF EXISTS `merchant_open`;

CREATE TABLE `merchant_open` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '商家索id',
  `name` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家名字',
  `opentime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '营业时间',
  `givemoney` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '起送价',
  `method` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '配送方式',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态',
  `money` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '配送费',
  `num` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '总销量',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `merchant_open` */

/*Table structure for table `operation_log` */

DROP TABLE IF EXISTS `operation_log`;

CREATE TABLE `operation_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `type` tinyint(4) DEFAULT NULL COMMENT '操作类型写死',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '操作时间',
  `amount_change` float DEFAULT NULL COMMENT '金额变化',
  `balance` float DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `operation_log` */

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL COMMENT '��ˮ����',
  `userid` int(11) NOT NULL COMMENT '�û�id',
  `shopid` int(11) NOT NULL COMMENT '�̼�id',
  `shop_name` varchar(18) NOT NULL,
  `shop_phone` varchar(20) NOT NULL,
  `goods_num` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` smallint(6) DEFAULT '0' COMMENT '״̬',
  `order_description` varchar(100) DEFAULT NULL COMMENT '��������',
  `over_time` datetime DEFAULT NULL COMMENT '��������ʱ��',
  `delivery_fee` float DEFAULT '0' COMMENT '���ͷ�',
  `lunch_box_fee` float DEFAULT NULL COMMENT '�ͺз�',
  `service_time` int(11) DEFAULT NULL COMMENT '�ʹ�ķ�ʱ��(����)',
  `packetid` int(11) DEFAULT NULL COMMENT '���id, ����',
  `pay` smallint(6) DEFAULT NULL COMMENT '֧����ʽ',
  `distribution` smallint(6) DEFAULT '0' COMMENT '���ͷ�ʽ0,1,2 �̼��Լ��е�, ���������',
  `invoice_info` longtext COMMENT '��Ʊ��Ϣ(Ҫ��˼��)',
  `remark` varchar(225) DEFAULT NULL COMMENT '��ע',
  PRIMARY KEY (`id`),
  KEY `order_userid` (`userid`),
  KEY `order_shopid` (`shopid`),
  KEY `order_packet` (`packetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order` */

/*Table structure for table `order_details` */

DROP TABLE IF EXISTS `order_details`;

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL COMMENT '����id ����',
  `shopid` int(11) DEFAULT NULL COMMENT '�̼�id ����',
  `order_time` datetime DEFAULT NULL COMMENT '��������ʱ��',
  `foodid` int(11) DEFAULT NULL COMMENT '��Ʒid, ����',
  `price` float DEFAULT NULL COMMENT '��Ʒ�۸�',
  `num` int(11) DEFAULT '1' COMMENT '��Ʒ����',
  PRIMARY KEY (`id`),
  KEY `order_details_orderid` (`orderid`),
  KEY `order_details_shopid` (`shopid`),
  KEY `order_details_foodid` (`foodid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `order_details` */

/*Table structure for table `packet` */

DROP TABLE IF EXISTS `packet`;

CREATE TABLE `packet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `typeid` int(11) DEFAULT NULL COMMENT '红包类型id',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '领取时间',
  `end_time` timestamp NULL DEFAULT NULL COMMENT '失效时间',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `packet` */

/*Table structure for table `packet_type` */

DROP TABLE IF EXISTS `packet_type`;

CREATE TABLE `packet_type` (
  `id` int(11) NOT NULL COMMENT '主键',
  `amount` int(11) DEFAULT '0' COMMENT '金额',
  `condition` int(11) DEFAULT '100' COMMENT '满多少才可用amount',
  `type` smallint(6) DEFAULT '0' COMMENT '普通红包0, 首单红包1',
  `time_limit` int(11) DEFAULT '30' COMMENT '时限(天数), 多少天后过期',
  `restriction` smallint(6) DEFAULT '0' COMMENT '0,1,2,3,4使用限制, 后台自定义(逻辑)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `packet_type` */

/*Table structure for table `personal` */

DROP TABLE IF EXISTS `personal`;

CREATE TABLE `personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `score` int(11) DEFAULT NULL COMMENT '个人积分',
  `red_packet` int(11) DEFAULT NULL COMMENT '红包个数',
  `balance` float DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `personal` */

/*Table structure for table `r_n` */

DROP TABLE IF EXISTS `r_n`;

CREATE TABLE `r_n` (
  `rid` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `r_n` */

/*Table structure for table `score` */

DROP TABLE IF EXISTS `score`;

CREATE TABLE `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id ',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '操作时间',
  `change` int(11) DEFAULT NULL COMMENT '变更',
  `detail` varchar(255) DEFAULT NULL COMMENT '详情',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `score` */

/*Table structure for table `u_r` */

DROP TABLE IF EXISTS `u_r`;

CREATE TABLE `u_r` (
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `u_r` */

/*Table structure for table `user_info` */

DROP TABLE IF EXISTS `user_info`;

CREATE TABLE `user_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '用户id',
  `username` varchar(16) DEFAULT NULL COMMENT '用户名（只可修改一次）',
  `name_status` tinyint(4) DEFAULT NULL COMMENT '用户权限',
  `password` varchar(18) DEFAULT NULL COMMENT '密码',
  `sex` char(1) DEFAULT NULL COMMENT '性别',
  `phone` char(11) DEFAULT NULL COMMENT '电话',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `picname` varchar(50) DEFAULT NULL COMMENT '图片',
  `payment_limit` int(11) DEFAULT NULL COMMENT '支付额度',
  ` register_time` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `first_login_time` timestamp NULL DEFAULT NULL COMMENT '首次登陆时间',
  `del_time` timestamp NULL DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`id`,`userid`),
  UNIQUE KEY `uid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `user_info` */

insert  into `user_info`(`id`,`userid`,`username`,`name_status`,`password`,`sex`,`phone`,`email`,`picname`,`payment_limit`,` register_time`,`first_login_time`,`del_time`) values 
(1,1231231232,'hubiteng',0,'ababab','m','13773136524','hubiteng@163.com','sdfa.jpeg',50,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,808987897,'huchuyao',0,'ababab','m','13376787654','huchuyao@163.com','sdfsdfsdf',100,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
