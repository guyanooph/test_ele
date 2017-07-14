/*
Navicat MySQL Data Transfer

Source Server         : php180
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test3

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-27 19:45:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_com
-- ----------------------------
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

-- ----------------------------
-- Records of admin_com
-- ----------------------------

-- ----------------------------
-- Table structure for admin_num
-- ----------------------------
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

-- ----------------------------
-- Records of admin_num
-- ----------------------------

-- ----------------------------
-- Table structure for admin_offer
-- ----------------------------
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

-- ----------------------------
-- Records of admin_offer
-- ----------------------------

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `password` varchar(16) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `logtime` varchar(10) DEFAULT NULL,
  `addtime` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_user
-- ----------------------------

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `id` varchar(6) NOT NULL,
  `userid` varchar(6) DEFAULT NULL,
  `shopid` varchar(6) DEFAULT NULL,
  `create_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------

-- ----------------------------
-- Table structure for delivery_address
-- ----------------------------
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

-- ----------------------------
-- Records of delivery_address
-- ----------------------------

-- ----------------------------
-- Table structure for evaluate
-- ----------------------------
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

-- ----------------------------
-- Records of evaluate
-- ----------------------------

-- ----------------------------
-- Table structure for food
-- ----------------------------
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

-- ----------------------------
-- Records of food
-- ----------------------------

-- ----------------------------
-- Table structure for food_eva
-- ----------------------------
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

-- ----------------------------
-- Records of food_eva
-- ----------------------------

-- ----------------------------
-- Table structure for food_standard
-- ----------------------------
DROP TABLE IF EXISTS `food_standard`;
CREATE TABLE `food_standard` (
  `id` varchar(6) NOT NULL,
  `norms` varchar(10) DEFAULT NULL,
  `shopid` varchar(6) DEFAULT NULL,
  `foodid` varchar(6) DEFAULT NULL,
  `pfice` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_standard
-- ----------------------------

-- ----------------------------
-- Table structure for food_type
-- ----------------------------
DROP TABLE IF EXISTS `food_type`;
CREATE TABLE `food_type` (
  `id` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '种类名称',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `shop` (`shopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_type
-- ----------------------------

-- ----------------------------
-- Table structure for location
-- ----------------------------
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

-- ----------------------------
-- Records of location
-- ----------------------------

-- ----------------------------
-- Table structure for login_user
-- ----------------------------
DROP TABLE IF EXISTS `login_user`;
CREATE TABLE `login_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id ',
  `username` varchar(16) DEFAULT NULL COMMENT '用户名',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `phone` char(11) DEFAULT NULL COMMENT '手机',
  `password` varchar(18) DEFAULT NULL COMMENT '密码',
  `last_login_time` timestamp NULL DEFAULT NULL COMMENT '登陆时间',
  `last_ip` varchar(15) DEFAULT NULL COMMENT '登陆ip',
  PRIMARY KEY (`id`),
  KEY `uid` (`userid`),
  KEY `use` (`username`),
  KEY `mal` (`email`),
  KEY `poe` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_user
-- ----------------------------

-- ----------------------------
-- Table structure for merchant
-- ----------------------------
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
  `month_num` int(5) DEFAULT NULL COMMENT '月销量',
  `opentime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '营业时间',
  `givemoney` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '起送价',
  `method` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '配送方式',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态',
  `money` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT '配送费',
  `num` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '总销量',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- ----------------------------
-- Table structure for mer_login
-- ----------------------------
DROP TABLE IF EXISTS `mer_login`;
CREATE TABLE `mer_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商店账户',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电话',
  `email` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '邮箱',
  `password` varchar(18) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `last_login_time` date DEFAULT NULL COMMENT '上次登陆时间',
  `last_login_ip` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT '上次登陆IP',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mer_login
-- ----------------------------

-- ----------------------------
-- Table structure for mer_register
-- ----------------------------
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
  `type` varchar(5) DEFAULT NULL COMMENT '店面分类',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mer_register
-- ----------------------------

-- ----------------------------
-- Table structure for mer_type
-- ----------------------------
DROP TABLE IF EXISTS `mer_type`;
CREATE TABLE `mer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类ID',
  `path` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mer_type
-- ----------------------------

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(16) DEFAULT NULL,
  `action` varchar(16) DEFAULT NULL,
  `method` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------

-- ----------------------------
-- Table structure for operation_log
-- ----------------------------
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

-- ----------------------------
-- Records of operation_log
-- ----------------------------

-- ----------------------------
-- Table structure for order
-- ----------------------------
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

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for order_details
-- ----------------------------
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

-- ----------------------------
-- Records of order_details
-- ----------------------------

-- ----------------------------
-- Table structure for packet
-- ----------------------------
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

-- ----------------------------
-- Records of packet
-- ----------------------------

-- ----------------------------
-- Table structure for packet_type
-- ----------------------------
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

-- ----------------------------
-- Records of packet_type
-- ----------------------------

-- ----------------------------
-- Table structure for personal
-- ----------------------------
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

-- ----------------------------
-- Records of personal
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for r_n
-- ----------------------------
DROP TABLE IF EXISTS `r_n`;
CREATE TABLE `r_n` (
  `rid` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of r_n
-- ----------------------------

-- ----------------------------
-- Table structure for score
-- ----------------------------
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

-- ----------------------------
-- Records of score
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
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
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`,`userid`),
  UNIQUE KEY `uid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '1231231232', 'hubiteng', '0', 'ababab', 'm', '13773136524', 'hubiteng@163.com', 'sdfa.jpeg', '50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO `user_info` VALUES ('2', '808987897', 'huchuyao', '0', 'ababab', 'm', '13376787654', 'huchuyao@163.com', 'sdfsdfsdf', '100', null, null, null, '0');

-- ----------------------------
-- Table structure for u_r
-- ----------------------------
DROP TABLE IF EXISTS `u_r`;
CREATE TABLE `u_r` (
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of u_r
-- ----------------------------
