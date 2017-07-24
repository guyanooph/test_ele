-- MySQL dump 10.13  Distrib 5.5.56, for Linux (x86_64)
--
-- Host: localhost    Database: test_ele
-- ------------------------------------------------------
-- Server version	5.5.56-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_com`
--

DROP TABLE IF EXISTS `admin_com`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_com`
--

LOCK TABLES `admin_com` WRITE;
/*!40000 ALTER TABLE `admin_com` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_com` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_node`
--

DROP TABLE IF EXISTS `admin_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `method` varchar(8) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_node` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_node`
--

LOCK TABLES `admin_node` WRITE;
/*!40000 ALTER TABLE `admin_node` DISABLE KEYS */;
INSERT INTO `admin_node` VALUES (12,'添加会员','get','admin/user/create',1,'2017-07-03 03:24:55',NULL),(16,'修改会员信息','get','admin/user/edit',1,'2017-07-03 06:51:58',NULL),(17,'普通管理员执行添加','post','admin/user',1,'2017-07-16 03:06:57',NULL),(18,'执行普通管理员修改','put','admin/user',1,'2017-07-16 03:07:39',NULL),(19,'执行普通管理员删除','delete','admin/delete',1,'2017-07-16 03:08:14',NULL),(20,'角色加载添加页','get','admin/role/create',1,'2017-07-16 03:08:59',NULL),(21,'角色执行添加','post','admin/role',1,'2017-07-16 03:09:24',NULL),(22,'加载角色编辑模板','get','admin/role/edit',1,'2017-07-16 03:09:51',NULL),(23,'执行角色修改','put','admin/role',1,'2017-07-16 03:10:50',NULL),(24,'角色删除操作','delete','admin//role/destroy',1,'2017-07-16 03:11:45',NULL),(25,'加载节点分配模板','get','admin/role/loadNode',1,'2017-07-16 03:12:36',NULL);
/*!40000 ALTER TABLE `admin_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_num`
--

DROP TABLE IF EXISTS `admin_num`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_num`
--

LOCK TABLES `admin_num` WRITE;
/*!40000 ALTER TABLE `admin_num` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_num` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_offer`
--

DROP TABLE IF EXISTS `admin_offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_offer`
--

LOCK TABLES `admin_offer` WRITE;
/*!40000 ALTER TABLE `admin_offer` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_role`
--

DROP TABLE IF EXISTS `admin_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(16) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_role` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_role`
--

LOCK TABLES `admin_role` WRITE;
/*!40000 ALTER TABLE `admin_role` DISABLE KEYS */;
INSERT INTO `admin_role` VALUES (27,'普通员工',1,'2017-07-03 02:38:49','2017-07-16 00:52:13'),(28,'经理',1,'2017-07-03 02:39:05','2017-07-15 20:47:05');
/*!40000 ALTER TABLE `admin_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_root`
--

DROP TABLE IF EXISTS `admin_root`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_root` (
  `id` int(11) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `logtime` timestamp NULL DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_root`
--

LOCK TABLES `admin_root` WRITE;
/*!40000 ALTER TABLE `admin_root` DISABLE KEYS */;
INSERT INTO `admin_root` VALUES (1,'root','root','超级管理员','2017-07-20 21:22:40','2017-06-27 16:00:00');
/*!40000 ALTER TABLE `admin_root` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `name` varchar(16) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(255) DEFAULT NULL,
  `picname` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `role` varchar(16) DEFAULT NULL,
  `logtime` timestamp NULL DEFAULT NULL,
  `addtime` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_user` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES ('tina4',20,'$2y$10$O1IaP.GYZtbWYCHgkajPhO5Xo9lI5KFi5Ps4cx6bzNn70RNXGjpi2','10b31e21d00ce08e4caf0f39d1004f77.jpg','15138958854','28','2017-07-20 21:30:26','2017-07-15 22:49:39','2017-07-16 01:04:49'),('tina1',23,'$2y$10$APhZh3P.YL37W3Z0XOtkD.3EBGo41C4NLdvcXuP1Qp45X/knHNq6G','8d06a6882988f41410a6edf043295075.jpg','15138958851','27','2017-07-20 21:29:47','2017-07-16 03:42:02','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_message` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(255) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `unique_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
INSERT INTO `chat_message` VALUES (1,1,'Howdy everyone','2017-07-16 01:41:29','2017-07-16 01:41:29'),(2,1,'Howdy everyone','2017-07-16 01:49:11','2017-07-16 01:49:11'),(3,1,'Howdy everyone','2017-07-16 01:55:09','2017-07-16 01:55:09'),(4,1,'Howdy everyone','2017-07-16 01:56:15','2017-07-16 01:56:15'),(5,1,'Howdy everyone','2017-07-16 01:57:34','2017-07-16 01:57:34'),(6,1,'Howdy everyone','2017-07-16 01:57:38','2017-07-16 01:57:38'),(7,1,'Howdy everyone','2017-07-16 01:58:24','2017-07-16 01:58:24'),(8,1,'hello world','2017-07-16 03:15:21','2017-07-16 03:15:21'),(9,1,'hello world','2017-07-16 03:17:20','2017-07-16 03:17:20'),(10,1,'hello world','2017-07-16 03:20:29','2017-07-16 03:20:29'),(11,1,'hello world','2017-07-16 03:21:54','2017-07-16 03:21:54'),(12,1,'hello world','2017-07-16 03:26:30','2017-07-16 03:26:30'),(13,1,'hello world','2017-07-16 03:51:42','2017-07-16 03:51:42'),(14,1,'hello world','2017-07-16 03:53:00','2017-07-16 03:53:00'),(15,1,'hello world','2017-07-16 03:53:43','2017-07-16 03:53:43'),(16,1,'hello world','2017-07-16 03:54:37','2017-07-16 03:54:37');
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collect`
--

DROP TABLE IF EXISTS `collect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `collect` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `shopid` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `collect`
--

LOCK TABLES `collect` WRITE;
/*!40000 ALTER TABLE `collect` DISABLE KEYS */;
INSERT INTO `collect` VALUES (6,4,52,'2017-07-18 04:16:45'),(7,4,58,'2017-07-18 07:07:10'),(8,4,53,'2017-07-18 18:58:19'),(9,4,56,'2017-07-18 19:00:11');
/*!40000 ALTER TABLE `collect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_address`
--

DROP TABLE IF EXISTS `delivery_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '收货地址表',
  `userid` int(11) DEFAULT NULL,
  `name` varchar(16) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `other_phone` varchar(11) DEFAULT NULL,
  `position` varchar(15) DEFAULT NULL,
  `lati_long` varchar(30) DEFAULT NULL COMMENT '经纬度',
  `address` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `address_details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_address`
--

LOCK TABLES `delivery_address` WRITE;
/*!40000 ALTER TABLE `delivery_address` DISABLE KEYS */;
INSERT INTO `delivery_address` VALUES (1,4,'aaaaa','1','123123123',NULL,NULL,'undefined,undefined','回龙观风雅园二区3号楼底商南侧(育知西路与龙禧三街道交叉口)','2017-07-16 16:47:29','2017-07-20 23:31:30','123掐额掐'),(2,4,'哈哈哈','1','234234234',NULL,'wx4dnuvzbd75','116.320178,39.753998','枣园路北150米','2017-07-18 18:57:29','2017-07-19 11:10:05','扽光森哥');
/*!40000 ALTER TABLE `delivery_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluate`
--

DROP TABLE IF EXISTS `evaluate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '商户id',
  `userid` int(11) NOT NULL COMMENT '用户id',
  `orderid` int(11) NOT NULL COMMENT '订单id',
  `anonymous` char(1) NOT NULL DEFAULT '1',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `shopg_rate` tinyint(1) NOT NULL COMMENT '对商户的评星',
  `shop_content` varchar(255) NOT NULL DEFAULT '' COMMENT '商户回复的内容',
  `service_time` int(11) NOT NULL COMMENT '订单送达的时间（外键）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:可见；2：不可见',
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP COMMENT '评论创建时间',
  PRIMARY KEY (`id`),
  KEY `商户id` (`shopid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluate`
--

LOCK TABLES `evaluate` WRITE;
/*!40000 ALTER TABLE `evaluate` DISABLE KEYS */;
INSERT INTO `evaluate` VALUES (1,1,1,1,'1','好',2,'111',0,1,'2017-07-21 08:16:18'),(2,2,2,2,'2','好',2,'131434',0,1,'2017-07-20 16:57:10'),(5,52,4,11,'1','好',4,'',60,1,'2017-07-19 16:30:17'),(11,58,4,12,'1','好',4,'',60,1,'2017-07-19 16:30:19');
/*!40000 ALTER TABLE `evaluate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `title` varchar(16) DEFAULT NULL,
  `picname` varchar(70) DEFAULT NULL,
  `descr` varchar(100) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `foodrate` float(3,2) DEFAULT NULL,
  `norms` char(1) DEFAULT NULL,
  `stutas` tinyint(1) DEFAULT NULL,
  `create_time` varchar(10) DEFAULT NULL,
  `rate_num` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,7,20,'紫菜汤','c2abbef6cc0ea8235e237e7402e77ac8.jpg','浓浓的汤',22.00,345,3.50,'',1,'2017-07-12',23),(2,17,28,'大大',NULL,'哈哈哈对对对',35.00,36,5.00,NULL,1,NULL,230),(3,16,20,'蛋花汤','bf7fef21faa32450936d7fb005b01510.jpg','浓浓的汤',23.00,24,4.30,NULL,1,'2017-07-13',23),(4,17,28,'吃不了','','吃不动了',25.00,12,4.20,'',1,'',23),(5,19,28,'吃不了','','吃不动了',25.00,12,4.20,'',1,'',23),(8,23,52,'打烤翅','1fce29d2fd78dc0425f5c5daaf65d516.jpg','奥尔良烤翅',33.00,43,4.30,NULL,1,'2017-07-21',23),(10,24,52,'万州烤鱼','d6c8a6c26db4ab4887b3186d3f925a46.jpg','万州烤鱼',34.00,53,3.50,NULL,1,'2017-07-17',23),(13,25,58,'蛋糕','305b82f47626850ec8b13acba40b9152.jpg','蛋糕',7.00,55,5.00,NULL,1,'2017-07-17',23),(14,22,52,'123',NULL,'111',22.00,NULL,NULL,NULL,1,'2017-07-21',0),(15,22,52,'面','571987745c620be120e526d8a3307816.jpg','面',7.00,NULL,NULL,NULL,1,'2017-07-20',0);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_eva`
--

DROP TABLE IF EXISTS `food_eva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_eva` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commentid` int(11) NOT NULL,
  `foodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `shopid` int(11) NOT NULL,
  `rate` tinyint(1) DEFAULT NULL COMMENT '评星',
  `content` varchar(255) DEFAULT NULL COMMENT '评论内容',
  PRIMARY KEY (`id`),
  KEY `shop` (`shopid`),
  KEY `user` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_eva`
--

LOCK TABLES `food_eva` WRITE;
/*!40000 ALTER TABLE `food_eva` DISABLE KEYS */;
INSERT INTO `food_eva` VALUES (4,5,7,4,52,3,'不好次'),(5,5,8,4,52,3,'还可以'),(6,5,9,4,52,3,'很好'),(12,11,13,4,58,2,'sdf');
/*!40000 ALTER TABLE `food_eva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_standard`
--

DROP TABLE IF EXISTS `food_standard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_standard` (
  `id` varchar(6) NOT NULL,
  `norms` varchar(10) DEFAULT NULL,
  `shopid` varchar(6) DEFAULT NULL,
  `foodid` varchar(6) DEFAULT NULL,
  `pfice` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_standard`
--

LOCK TABLES `food_standard` WRITE;
/*!40000 ALTER TABLE `food_standard` DISABLE KEYS */;
/*!40000 ALTER TABLE `food_standard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_type`
--

DROP TABLE IF EXISTS `food_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '种类名称',
  `create_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `shop` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_type`
--

LOCK TABLES `food_type` WRITE;
/*!40000 ALTER TABLE `food_type` DISABLE KEYS */;
INSERT INTO `food_type` VALUES (1,20,'北京烧烤','2017-07-15 09:00:04'),(5,20,'撒旦','2017-07-15 09:00:09'),(7,20,'汤面','2017-07-15 09:00:11'),(8,20,'冰淇淋','2017-07-15 09:00:13'),(10,20,'三大','2017-07-15 09:00:15'),(14,20,'大专','2017-07-15 09:00:18'),(15,20,'去去去','2017-07-15 09:00:20'),(16,20,'菜汤','2017-07-15 09:00:22'),(17,20,'甜食','2017-07-15 09:00:22'),(18,20,'小吃','2017-07-15 09:00:24'),(19,20,'快餐','2017-07-15 09:00:26'),(20,20,'小吃','2017-07-15 09:00:35'),(21,28,'汤面',NULL),(22,52,'汤面',NULL),(23,52,'烧烤',NULL),(24,52,'菜单',NULL),(25,58,'甜食',NULL),(26,52,'小吃2','2017-07-21 08:07:36'),(27,52,'小1111','2017-07-21 08:14:33');
/*!40000 ALTER TABLE `food_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址描述',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '位置方位',
  `longitude` float DEFAULT NULL COMMENT '经度',
  `latitude` float DEFAULT NULL COMMENT '经度',
  `city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属城市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_user`
--

DROP TABLE IF EXISTS `login_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) DEFAULT NULL COMMENT '用户名',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `phone` char(11) DEFAULT NULL COMMENT '手机',
  `password` varchar(60) DEFAULT NULL COMMENT '密码',
  `status` tinyint(1) DEFAULT '1',
  `last_login_time` timestamp NULL DEFAULT NULL COMMENT '登陆时间',
  `last_ip` varchar(15) DEFAULT NULL COMMENT '登陆ip',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `picname` varchar(255) NOT NULL DEFAULT 'hu.jpg',
  PRIMARY KEY (`id`),
  KEY `use` (`username`),
  KEY `mal` (`email`),
  KEY `poe` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_user`
--

LOCK TABLES `login_user` WRITE;
/*!40000 ALTER TABLE `login_user` DISABLE KEYS */;
INSERT INTO `login_user` VALUES (2,'小薯条',NULL,'15138958851','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i',0,'2017-07-09 19:09:03','127.0.0.1','0000-00-00 00:00:00','hu.jpg'),(3,'小南瓜',NULL,'15210966147','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i',1,'2017-07-11 04:18:39','127.0.0.1','0000-00-00 00:00:00','hu.jpg'),(4,'小鼠标',NULL,'13773136524','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i',1,'2017-07-20 09:40:03','192.168.42.42','2017-07-20 09:40:03','hu.jpg'),(5,'小键盘',NULL,'15136682791','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i',0,'2017-07-13 23:14:17','127.0.0.1','0000-00-00 00:00:00','hu.jpg'),(6,'9118099',NULL,'17801074741',NULL,0,'2017-07-19 07:37:47','127.0.0.1','0000-00-00 00:00:00','hu.jpg');
/*!40000 ALTER TABLE `login_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mer_login`
--

DROP TABLE IF EXISTS `mer_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mer_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL,
  `shopname` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商店账户',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '电话',
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `last_login_time` date DEFAULT NULL COMMENT '上次登陆时间',
  `last_login_ip` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT '上次登陆IP',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mer_login`
--

LOCK TABLES `mer_login` WRITE;
/*!40000 ALTER TABLE `mer_login` DISABLE KEYS */;
INSERT INTO `mer_login` VALUES (44,52,'五组饭店','15555555555','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i','2017-07-20','192.168.42.139'),(45,53,'德庄火锅','15123232121','$2y$10$c6DNDBYo/R0/h2p2kujbOOjyZ/0gpYr3dFY33uZXg.SeLz1N3NPqe','2017-07-18','127.0.0.1'),(46,54,'湘之情','15123236767','$2y$10$aeBfSk5bULYusdKmBIV0.ui6xepTT6gJrlUQI3CL/i5uFgby9Zuo2',NULL,NULL),(47,55,'蘑菇茶餐厅','15134232323','$2y$10$oWt5Vxkm..M.mRjpDnxsuuagtt2VZAgTn/tZujL6N9XP1vjEmqdIG',NULL,NULL),(48,56,'德克士汉堡','13223234334','$2y$10$YmoEtr8t0gEoV2gLzEYTrehAG59vTgf5KvQGj3GEETAUH91f6YVVG',NULL,NULL),(49,57,'肯德基','15123231212','$2y$10$zkeb7VtTInliTch1j8EEkO4R9aH1uceGDJOIivE6q3OeOOM844xs.',NULL,NULL),(50,58,'包子点','12323456543','$2y$10$C1R97yb4hGu6xsjaoR9MA.K6NMcTkLpf6y2lLN6WuPnbeT8KK95w.','2017-07-17','192.168.42.156'),(51,59,'粥店','15123231214','$2y$10$crX.USB8THHBG4yWORxmi.qJRtNmkCmZC5URE/YYg1UVC7B3V3OGi',NULL,NULL),(52,60,'回龙观','13773136524','$2y$10$RzKqoY002QpITdxRHGNgzuNuAs7B/gmijX0kxUYKkw85TIWY1K08i',NULL,NULL),(53,61,'去去去','15177777777','$2y$10$RzKqoY002QpITdxRHGNgzuNuAs7B/gmijX0kxUYKkw85TIWY1K08i',NULL,NULL),(54,62,'速度','15133333330','$2y$10$CyZJ4Zf4uYRrTCU4YUyR6.0RQjqbtsupqR5ml.dKg4aG3HiYC4Uzi',NULL,NULL),(55,63,'山西刀削面','15111111111','$2y$10$X6Wdal39uVawtRVg6YR1qO/fWeOy/EDaOb1etw5uzToqUsqQrVgQG','2017-07-19','127.0.0.1'),(56,64,'张柳柳','13666666666','$2y$10$ArvDsBe6cgQ7XSI9hFC3t.WF/6Tvz1D4rUJjFDBwutn4jtXIwDINa',NULL,NULL),(57,65,'哇卡卡','15138958851','$2y$10$J80RbPMBbpKgd6QGy9wV.Okns7ngrd9MJsDwN/ADLwOOD3vqigITO','2017-07-21','127.0.0.1'),(58,66,'哇咔咔啊','15138958852','$2y$10$vqXc3oJ/OBMrDYEjdNXYB.zmlqRLpOgSh1wdlvYGcJvcnUV0OGRZm',NULL,NULL);
/*!40000 ALTER TABLE `mer_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mer_mid`
--

DROP TABLE IF EXISTS `mer_mid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mer_mid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mer_mid` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mer_mid`
--

LOCK TABLES `mer_mid` WRITE;
/*!40000 ALTER TABLE `mer_mid` DISABLE KEYS */;
INSERT INTO `mer_mid` VALUES (1,'特色菜系','2017-07-07 16:30:54',1),(2,'美食','2017-07-07 16:30:58',0),(3,'异国料理','2017-07-07 16:30:59',0),(4,'小吃夜宵','2017-07-07 16:31:06',0),(5,'甜品饮品','2017-07-07 16:31:01',1);
/*!40000 ALTER TABLE `mer_mid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mer_register`
--

DROP TABLE IF EXISTS `mer_register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mer_register` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mername` varchar(16) DEFAULT NULL COMMENT '店面账户',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `shoptitle` varchar(16) DEFAULT NULL COMMENT '商家信息',
  `picname` varchar(255) DEFAULT NULL COMMENT '店面照片',
  `logoname` varchar(60) DEFAULT NULL COMMENT '照片',
  `typeid` varchar(5) DEFAULT NULL COMMENT '店面分类',
  `username` varchar(5) DEFAULT NULL COMMENT '真实姓名',
  `identity` varchar(32) DEFAULT NULL COMMENT '身份证',
  `phone` char(11) DEFAULT NULL COMMENT '电话',
  `city` varchar(32) DEFAULT NULL COMMENT '城市',
  `position` varchar(32) DEFAULT NULL COMMENT '位置方位',
  `longitude_latitude` varchar(40) DEFAULT NULL COMMENT '经纬度',
  `address` varchar(50) DEFAULT NULL COMMENT '详细地址',
  `state` tinyint(1) DEFAULT '1' COMMENT '状态',
  `register_time` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `first_ip` varchar(15) DEFAULT NULL COMMENT '首次登陆ip',
  `first_login_time` timestamp NULL DEFAULT NULL COMMENT '首次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mer_register`
--

LOCK TABLES `mer_register` WRITE;
/*!40000 ALTER TABLE `mer_register` DISABLE KEYS */;
INSERT INTO `mer_register` VALUES (52,'tina1212','$2y$10$9Et2xmsDvYjHAzBvEVnoBOJ5M9s2HuVZimGfcke5cYvq0BWpm736i','五组饭店','0c12f49d7dbc834b90873d2fca98edf2.jpg','0c12f49d7dbc834b90873d2fca98edf2.jpg','6','传奇五组','411425198902231234','15555555555','北京市','wx4d3u3gx7eg','116.095249,39.794474','北京市丰台区王佐镇青龙湖餐厅',2,'2017-07-15 02:58:06','127.0.0.1','2017-07-15 02:59:17'),(53,'tina1111','$2y$10$c6DNDBYo/R0/h2p2kujbOOjyZ/0gpYr3dFY33uZXg.SeLz1N3NPqe','德庄火锅','0c12f49d7dbc834b90873d2fca98edf2.jpg','0c12f49d7dbc834b90873d2fca98edf2.jpg','7','章德庄','411425198602122312','15123232121','北京市','wx4d322mx6u2','116.071217,39.77284','北京市房山区青龙湖镇窦各庄路',2,'2017-07-15 03:30:47','127.0.0.1','2017-07-16 16:51:31'),(54,'tina2222','$2y$10$aeBfSk5bULYusdKmBIV0.ui6xepTT6gJrlUQI3CL/i5uFgby9Zuo2','湘之情','82a2225bce55f1d364d93ceaca7993fd.jpg','740659c3b9ae8e858563f26a3f77d906.jpg','8','章湘','411425197202132323','15123236767','泉州市','wskn9bz1nkuv','118.211792,25.053146','福建省泉州市安溪县参内乡安溪恒禾湾美2期',2,'2017-07-15 06:02:12','127.0.0.1',NULL),(55,'tina3333','$2y$10$oWt5Vxkm..M.mRjpDnxsuuagtt2VZAgTn/tZujL6N9XP1vjEmqdIG','蘑菇茶餐厅','3640a10e0a9b39ada2d11d464f571430.jpg','a29373e2ab673e9a9358dd0a300d8205.jpg','7','章蘑菇','411425198702132323','15134232323','北京市','wx4d3hc4zr7u','116.06126,39.797112','北京市房山区青龙湖镇焦各庄村',2,'2017-07-15 06:13:24','127.0.0.1',NULL),(56,'tina1211','$2y$10$YmoEtr8t0gEoV2gLzEYTrehAG59vTgf5KvQGj3GEETAUH91f6YVVG','德克士汉堡','92e6b0cb172f92d0caf5e4f909299651.jpg','92e6b0cb172f92d0caf5e4f909299651.jpg','10','章汉堡','4114251987021302323','13223234334','兰州市','wq3v26d3rfhz','103.725353,36.093061','甘肃省兰州市安宁区孔家崖街道北滨河西路',4,'2017-07-15 06:20:58','127.0.0.1',NULL),(57,'tina5555','$2y$10$zkeb7VtTInliTch1j8EEkO4R9aH1uceGDJOIivE6q3OeOOM844xs.','肯德基','a256b3a2e964cc8be47185a540ad3c8e.jpg','37551accfa318fce44112650b7dfb790.png','10','章肯','411425198902302323','15123231212','北京市','wx4dkcb7tp92','116.224925,39.780762','北京市房山区长阳镇稻田路',2,'2017-07-15 06:33:20','127.0.0.1',NULL),(58,'slfrio','$2y$10$C1R97yb4hGu6xsjaoR9MA.K6NMcTkLpf6y2lLN6WuPnbeT8KK95w.','包子点','6b8f2f3b8cb180008df8929264427593.jpg','642df90a91e366d0b591ae45a79e1f80.jpg','9','胡必腾','421181198711063913','12323456543','北京市','wx4d1suj77k1','116.087181,39.753574','北京市房山区青龙湖镇阎吕路',2,'2017-07-17 04:22:18','192.168.42.156','2017-07-17 05:23:28'),(59,'tina6666','$2y$10$crX.USB8THHBG4yWORxmi.qJRtNmkCmZC5URE/YYg1UVC7B3V3OGi','粥店','796fe2057015d4233eaa85d8c1888313.jpg','8821c0dcf5d74e22875420349c8b4df6.jpg','8','张莹','411426198602121212','15123231214','兰州市','wq3yu4ryj3jg','103.897595,36.356169','甘肃省兰州市皋兰县石洞镇',2,'2017-07-17 04:52:34','127.0.0.1',NULL),(60,'hubiteng','$2y$10$RzKqoY002QpITdxRHGNgzuNuAs7B/gmijX0kxUYKkw85TIWY1K08i','回龙观','4f5e67aa969009440773de140b742c1c.jpg','5f71cbee3763f00c4e3d805994337d1f.jpg','8','胡必腾','421181198711063456','13773136524','北京市','wx4d4xyq5qgc','116.134216,39.770201','北京市房山区西潞街道西潞园',1,'2017-07-18 18:41:14','192.168.42.2',NULL),(61,'tina777','$2y$10$RzKqoY002QpITdxRHGNgzuNuAs7B/gmijX0kxUYKkw85TIWY1K08i','去去去','dee65384248f33690718616196f17f6d.jpg','1339083818a4e82c921fa17d984b5b17.jpg','8','张七七','411425199901112323','15177777777','兰州市','wj2bg12psc1k','91.186729,29.671246','西藏自治区拉萨市城关区纳金乡米琼日',2,'2017-07-18 20:25:57','127.0.0.1',NULL),(62,'tina3330','$2y$10$CyZJ4Zf4uYRrTCU4YUyR6.0RQjqbtsupqR5ml.dKg4aG3HiYC4Uzi','速度','73ed9752929795771cee5ef6d09f61fa.jpg','6db9170d306a0a3dcbb6fe248e4eece0.png','8','章速度','411425198906219876','15133333330','重庆市','wtq6m52hwevu','121.509076,29.945404','浙江省宁波市江北区洪塘街道洪塘中路216号颐和名郡',3,'2017-07-18 22:20:13','127.0.0.1',NULL),(63,'zy1212','$2y$10$X6Wdal39uVawtRVg6YR1qO/fWeOy/EDaOb1etw5uzToqUsqQrVgQG','山西刀削面','82a5af77b3dfae31a610179a74ef2d71.jpg','41157d9aa52b47ad0fc903383767789f.jpg','7','张晶晶','411425198906282312','15111111111','北京市','wx4d3etyp7hn','116.089756,39.790781','北京市丰台区开新农庄(青龙湖店)',4,'2017-07-18 22:32:25','127.0.0.1','2017-07-18 22:35:41'),(64,'zy666666','$2y$10$ArvDsBe6cgQ7XSI9hFC3t.WF/6Tvz1D4rUJjFDBwutn4jtXIwDINa','张柳柳','dbef38346657b404740da9d13784eb21.jpg','8a18a115bc2d7a06f0e38580cd2c973d.jpg','8','张柳柳','411425198906282341','13666666666','北京市','wx4g1z242b45','116.444127,39.942556','北京市东城区东直门街道东直门外小街22号百富怡大酒店',1,'2017-07-18 23:36:16','127.0.0.1',NULL),(65,'tina1234','$2y$10$J80RbPMBbpKgd6QGy9wV.Okns7ngrd9MJsDwN/ADLwOOD3vqigITO','哇卡卡','8fb787f2f0a87c49cdeb177ca462a45e.jpg','bd1e3961155abacfa5488ff7b5d195e1.jpg','8','张颖','411425198906286324','15138958851','北京市','wsk55gr3dvhq','118.299875,24.451732','北京市丰台区王佐镇山湖路',2,'2017-07-20 21:22:00','127.0.0.1','2017-07-20 21:24:55'),(66,'tina2323','$2y$10$vqXc3oJ/OBMrDYEjdNXYB.zmlqRLpOgSh1wdlvYGcJvcnUV0OGRZm','哇咔咔啊','029c5ee8cea06dddbe547e3f89f6f751.jpg','5b3399b71598c8310ce554a684243c9e.jpg','8','张莹莹','411425198906242323','15138958852','兰州市','wq3ttv4h4m8b','103.614905,36.151229','甘肃省兰州市安宁区沙井驿街道北环路',1,'2017-07-20 22:49:17','127.0.0.1',NULL);
/*!40000 ALTER TABLE `mer_register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mer_sid`
--

DROP TABLE IF EXISTS `mer_sid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mer_sid` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `mid` int(5) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mer_sid` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mer_sid`
--

LOCK TABLES `mer_sid` WRITE;
/*!40000 ALTER TABLE `mer_sid` DISABLE KEYS */;
INSERT INTO `mer_sid` VALUES (7,'云南菜',1,NULL,'2017-07-07 22:28:04',NULL),(8,'烧烤',1,NULL,'2017-07-14 23:57:33',NULL),(9,'简餐便当',2,NULL,'2017-07-15 06:18:17',NULL),(12,'冰淇淋',5,NULL,'2017-07-16 07:20:01',NULL),(13,'云南菜系',1,NULL,'2017-07-20 21:27:30',NULL);
/*!40000 ALTER TABLE `mer_sid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mer_type`
--

DROP TABLE IF EXISTS `mer_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT NULL COMMENT '父类ID',
  `path` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '分类路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mer_type`
--

LOCK TABLES `mer_type` WRITE;
/*!40000 ALTER TABLE `mer_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `mer_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `merchant`
--

DROP TABLE IF EXISTS `merchant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `merchant` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopid` int(11) NOT NULL COMMENT '商家索引ID',
  `shopname` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '商家名字',
  `logo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'logo图片',
  `rate` float DEFAULT '0' COMMENT '服务评价',
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家地址',
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家电话',
  `desc` char(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商家介绍',
  `service_time` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '平均配送时间',
  `month_num` int(5) DEFAULT NULL COMMENT '月销量',
  `lunch_box_fee` float unsigned DEFAULT NULL,
  `money` float DEFAULT NULL COMMENT '配送费',
  `commit` char(4) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '服务承诺',
  `opentime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '营业时间',
  `closetime` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '关闭时间',
  `givemoney` float DEFAULT NULL COMMENT '起送价',
  `position` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lati_long` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '经纬度',
  `method` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配送方式',
  `status` tinyint(1) DEFAULT '1' COMMENT '商家营业、停业',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态（营业、停业）',
  `num` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '总销量',
  `typeid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_typeid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate_num` int(10) unsigned DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `food_rate` float DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `shopid` (`shopid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='1     1    1    1\n新  准   保   票';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `merchant`
--

LOCK TABLES `merchant` WRITE;
/*!40000 ALTER TABLE `merchant` DISABLE KEYS */;
INSERT INTO `merchant` VALUES (12,23,'蛋糕','14998263901323.jpeg',3.5,'甘肃省兰州市皋兰县石洞镇124县道','15123232382','还可以','30',52,2,3,'0001','','21:00',10,'wx4d3u3gx7eg','116.095249,39.794474',1,1,1,'3000','','1',23423,'2017-07-19 13:03:49',0),(22,52,'五组饭店','0c12f49d7dbc834b90873d2fca98edf2.jpg',1,'北京市丰台区王佐镇青龙湖餐厅','15555555555','啦啦啦，好吃划算','30',123,7,20,'2222','7:00','24:00',20,'wx4d3u3gx7eg','116.095249,39.794474',1,1,2,'3000','6','1',122,'2017-07-21 07:39:24',0),(23,53,'德庄火锅','0c12f49d7dbc834b90873d2fca98edf2.jpg',4.5,'北京市房山区青龙湖镇窦各庄路','15123232121','666','30',888,23,10,'1101','09:00','21:00',20,'wx4d322mx6u2','116.071217,39.77284',1,1,2,'3000','7','1',234,'2017-07-19 13:03:54',0),(24,54,'湘之情','740659c3b9ae8e858563f26a3f77d906.jpg',3.6,'福建省泉州市安溪县参内乡安溪恒禾湾美2期','15123236767',NULL,'30',123,23,10,'0001','09:00','21:00',20,'wskn9bz1nkuv','118.211792,25.053146',1,1,2,'3000','8','1',423,'2017-07-19 13:04:03',0),(25,55,'蘑菇茶餐厅','a29373e2ab673e9a9358dd0a300d8205.jpg',4.6,'北京市房山区青龙湖镇焦各庄村','15134232323',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wx4d3hc4zr7u','116.06126,39.797112',1,1,2,'3000','7','1',0,'2017-07-19 12:42:55',0),(26,56,'德克士汉堡','92e6b0cb172f92d0caf5e4f909299651.jpg',3.6,'甘肃省兰州市安宁区孔家崖街道北滨河西路','13223234334',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wq3v26d3rfhz','103.725353,36.093061',1,1,4,'3000','10','2',23,'2017-07-21 05:25:32',0),(27,57,'肯德基','a256b3a2e964cc8be47185a540ad3c8e.jpg',4.6,'北京市房山区长阳镇稻田路','15123231212',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wx4dkcb7tp92','116.224925,39.780762',1,1,2,'3000','10','2',42,'2017-07-19 13:03:50',0),(28,58,'包子点','f05d000d240c21ac13e7d0296631adb4.jpg',5,'北京市房山区青龙湖镇阎吕路','12323456543','便宜，好吃','30',1500,7,10,'0101','09:00','21:00',20,'wx4d1suj77k1','116.087181,39.753574',1,1,2,'6000','9','2',34,'2017-07-19 13:03:50',0),(29,59,'粥店','8821c0dcf5d74e22875420349c8b4df6.jpg',3.4,'甘肃省兰州市皋兰县石洞镇','15123231214',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wq3yu4ryj3jg','103.897595,36.356169',1,1,2,'3000','8','1',234,'2017-07-19 13:03:51',0),(30,60,'回龙观','5f71cbee3763f00c4e3d805994337d1f.jpg',0,'北京市房山区西潞街道西潞园','13773136524',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wx4d4xyq5qgc','116.134216,39.770201',1,1,1,'3000','8','1',234,'2017-07-19 13:03:51',0),(31,61,'去去去','1339083818a4e82c921fa17d984b5b17.jpg',0,'西藏自治区拉萨市城关区纳金乡米琼日','15177777777',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wj2bg12psc1k','91.186729,29.671246',1,1,2,'3000','8','1',23,'2017-07-19 13:03:51',0),(32,62,'速度','6db9170d306a0a3dcbb6fe248e4eece0.png',0,'浙江省宁波市江北区洪塘街道洪塘中路216号颐和名郡','15133333330',NULL,'30',234,23,10,'0001','09:00','21:00',20,'wtq6m52hwevu','121.509076,29.945404',1,1,3,'3000','8','1',42,'2017-07-19 13:03:51',0),(33,63,'山西刀削面','41157d9aa52b47ad0fc903383767789f.jpg',0,'北京市丰台区开新农庄(青龙湖店)','15111111111',NULL,'30',234,32,10,'0001','09:00','21:00',20,'wx4d3etyp7hn','116.089756,39.790781',1,1,4,'3000','7','1',234,'2017-07-19 13:04:01',0),(34,64,'张柳柳','8a18a115bc2d7a06f0e38580cd2c973d.jpg',0,'北京市东城区东直门街道东直门外小街22号百富怡大酒店','13666666666',NULL,'30',234,32,10,'0001','09:00','21:00',20,'wx4g1z242b45','116.444127,39.942556',1,1,1,'3000','8','1',234,'2017-07-19 13:03:53',0),(35,65,'哇卡卡','bd1e3961155abacfa5488ff7b5d195e1.jpg',0,'北京市丰台区王佐镇山湖路','15138958851',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wsk55gr3dvhq','118.299875,24.451732',1,1,2,NULL,'8','1',0,'2017-07-21 05:24:36',0),(36,66,'哇咔咔啊','5b3399b71598c8310ce554a684243c9e.jpg',0,'甘肃省兰州市安宁区沙井驿街道北环路','15138958852',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wq3ttv4h4m8b','103.614905,36.151229',1,1,1,NULL,'8','1',0,NULL,0);
/*!40000 ALTER TABLE `merchant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(16) DEFAULT NULL,
  `action` varchar(16) DEFAULT NULL,
  `method` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operation_log`
--

DROP TABLE IF EXISTS `operation_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operation_log`
--

LOCK TABLES `operation_log` WRITE;
/*!40000 ALTER TABLE `operation_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `operation_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(11) DEFAULT NULL COMMENT '����id ����',
  `shopid` int(11) DEFAULT NULL COMMENT '�̼�id ����',
  `order_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '��������ʱ��',
  `foodid` int(11) DEFAULT NULL COMMENT '��Ʒid, ����',
  `price` float DEFAULT NULL COMMENT '��Ʒ�۸�',
  `num` int(11) DEFAULT '1' COMMENT '��Ʒ����',
  PRIMARY KEY (`id`),
  KEY `order_details_orderid` (`orderid`),
  KEY `order_details_shopid` (`shopid`),
  KEY `order_details_foodid` (`foodid`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,5,28,'2017-07-18 15:45:45',5,25,2),(2,5,52,'2017-07-16 23:10:59',7,34,1),(3,1,12,'2017-07-16 22:25:49',5,25,1),(4,7,52,'2017-07-16 23:41:06',10,34,10),(5,7,52,'2017-07-16 23:41:06',7,20,1),(6,8,52,'2017-07-17 04:59:47',9,23,1),(7,9,58,'2017-07-17 06:18:11',13,7,4),(8,10,52,'2017-07-18 10:33:54',7,20,1),(9,10,52,'2017-07-18 10:33:54',8,34,1),(10,10,52,'2017-07-18 10:33:54',9,23,1),(11,11,52,'2017-07-18 10:38:22',7,20,1),(12,11,52,'2017-07-18 10:38:22',8,34,0),(13,11,52,'2017-07-18 10:38:22',9,23,0),(14,12,58,'2017-07-18 13:40:39',13,7,0),(15,13,52,'2017-07-18 13:43:17',8,34,0),(16,13,52,'2017-07-18 13:43:17',7,20,1),(17,14,52,'2017-07-18 18:46:58',8,34,0),(18,14,52,'2017-07-18 18:46:58',10,34,0),(19,15,52,'2017-07-18 18:50:58',8,34,0),(20,15,52,'2017-07-18 18:50:58',10,34,0),(21,16,52,'2017-07-18 18:51:31',8,34,0),(22,16,52,'2017-07-18 18:51:31',10,34,0),(23,16,52,'2017-07-18 18:51:31',9,23,1),(24,17,52,'2017-07-19 02:24:55',7,20,0),(25,17,52,'2017-07-19 02:24:55',10,34,0),(26,17,52,'2017-07-19 02:24:55',8,34,1),(27,18,52,'2017-07-19 02:36:49',7,20,0),(28,18,52,'2017-07-19 02:36:49',10,34,0),(29,18,52,'2017-07-19 02:36:49',8,34,1),(30,19,52,'2017-07-19 02:39:17',7,20,0),(31,19,52,'2017-07-19 02:39:17',10,34,0),(32,19,52,'2017-07-19 02:39:17',8,34,0),(33,20,58,'2017-07-19 02:43:14',13,7,6),(34,21,58,'2017-07-19 02:44:21',13,7,6),(35,22,58,'2017-07-19 10:46:26',13,7,6),(36,23,52,'2017-07-19 10:48:21',7,20,0),(37,23,52,'2017-07-19 10:48:21',10,34,0),(38,23,52,'2017-07-19 10:48:21',8,34,0),(39,24,52,'2017-07-20 02:21:10',9,23,1),(40,24,52,'2017-07-20 02:21:10',7,20,1),(41,25,52,'2017-07-20 02:23:28',9,23,1),(42,25,52,'2017-07-20 02:23:28',7,20,1),(43,26,52,'2017-07-20 02:25:01',9,23,1),(44,26,52,'2017-07-20 02:25:01',7,20,1),(45,27,52,'2017-07-20 02:36:09',7,20,1),(46,27,52,'2017-07-20 02:36:09',9,23,1),(47,28,52,'2017-07-20 20:56:50',7,20,3),(48,28,52,'2017-07-20 20:56:50',8,34,1),(49,29,52,'2017-07-20 21:28:39',7,20,1),(50,29,52,'2017-07-20 21:28:39',8,34,1),(51,29,52,'2017-07-20 21:28:39',10,34,1);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '�û�id',
  `shopid` int(11) NOT NULL COMMENT '�̼�id',
  `shop_name` varchar(18) NOT NULL,
  `shop_phone` varchar(20) NOT NULL,
  `goods_num` int(11) unsigned DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `addressid` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` smallint(6) DEFAULT '0' COMMENT '״̬',
  `description` varchar(255) DEFAULT NULL COMMENT '订单菜品描述',
  `order_description` varchar(255) DEFAULT NULL COMMENT '订单描述',
  `over_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '��������ʱ��',
  `delivery_fee` float DEFAULT '0' COMMENT '���ͷ�',
  `lunch_box_fee` float DEFAULT NULL COMMENT '�ͺз�',
  `service_time` varchar(30) DEFAULT NULL COMMENT '�ʹ�ķ�ʱ��(����)',
  `packetid` int(11) DEFAULT NULL COMMENT '���id, ����',
  `pay` tinyint(6) DEFAULT '1' COMMENT '֧����ʽ',
  `distribution` tinyint(6) NOT NULL DEFAULT '1' COMMENT '���ͷ�ʽ0,1,2 �̼��Լ��е�, ���������',
  `invoice_info` longtext COMMENT '��Ʊ��Ϣ(Ҫ��˼��)',
  `remark` varchar(225) NOT NULL COMMENT '��ע',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `order_userid` (`userid`),
  KEY `order_shopid` (`shopid`),
  KEY `order_packet` (`packetid`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,20,'好吃','13261441214',14,'2017-05-14 01:26:00',1,125,1,NULL,'逾期未支付订单将自动取消','2017-07-18 18:20:53',0,NULL,'18:30',NULL,2,1,'无','备注','0000-00-00 00:00:00'),(5,4,28,'王一辉','15555555555',1,'2017-07-14 16:34:49',1,25,2,'吃不了 1份 ','逾期未支付订单将自动取消','2017-07-18 18:19:55',NULL,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(6,4,52,'五组饭店','15555555555',1,'2017-07-16 16:58:10',1,34,0,'紫菜汤 1份 ','逾期未支付订单将自动取消','2017-07-18 17:25:43',20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(7,4,52,'五组饭店','15555555555',1,'2017-07-17 07:41:06',1,360,0,'万州烤鱼 10份 紫菜汤 1份','逾期未支付订单将自动取消','2017-07-18 17:25:42',20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(8,4,52,'五组饭店','15555555555',0,'2017-07-17 12:59:47',1,23,0,'鸡蛋汤 1份 ','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(9,4,58,'包子点','12323456543',4,'2017-07-17 14:18:11',1,28,1,'蛋糕 4份 ','逾期未支付订单将自动取消','2017-07-17 14:32:49',10,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(10,4,52,'五组饭店','15555555555',1,'2017-07-18 18:33:54',1,77,0,'紫菜汤 1份 打烤翅 1份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(11,4,52,'五组饭店','15555555555',5,'2017-07-18 18:38:22',1,202,0,'紫菜汤 1份 打烤翅 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(12,4,58,'包子点','12323456543',6,'2017-07-18 21:40:39',1,42,3,'蛋糕 0份 ','逾期未支付订单将自动取消','2017-07-18 22:37:33',10,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(13,4,52,'五组饭店','15555555555',1,'2017-07-18 21:43:17',1,54,0,'打烤翅 0份 紫菜汤 1份','逾期未支付订单将自动取消','2017-07-18 22:36:51',20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(14,4,52,'五组饭店','15555555555',2,'2017-07-19 02:46:58',1,170,0,'打烤翅 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(15,4,52,'五组饭店','15555555555',2,'2017-07-19 02:50:58',1,170,0,'打烤翅 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(16,4,52,'五组饭店','15555555555',1,'2017-07-19 02:51:31',1,193,0,'打烤翅 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(17,2,52,'五组饭店','15555555555',1,'2017-07-19 10:24:55',1,128,0,'紫菜汤 0份 万州烤鱼 0份','逾期未支付订单将自动取消','2017-07-19 11:28:32',20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(18,2,52,'五组饭店','15555555555',1,'2017-07-19 10:36:49',1,128,0,'紫菜汤 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(19,2,52,'五组饭店','15555555555',2,'2017-07-19 10:39:17',1,162,0,'紫菜汤 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(20,4,58,'包子点','12323456543',6,'2017-07-19 10:43:14',1,42,0,'蛋糕 6份 ','逾期未支付订单将自动取消',NULL,10,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(21,4,58,'包子点','12323456543',6,'2017-07-19 10:44:21',1,42,0,'蛋糕 6份 ','逾期未支付订单将自动取消',NULL,10,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(22,4,58,'包子点','12323456543',6,'2017-07-19 18:46:26',1,42,0,'蛋糕 6份 ','逾期未支付订单将自动取消',NULL,10,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(23,2,52,'五组饭店','15555555555',3,'2017-07-19 18:48:21',1,196,0,'紫菜汤 0份 万州烤鱼 0份','逾期未支付订单将自动取消',NULL,20,NULL,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(24,4,52,'五组饭店','15555555555',1,'2017-07-20 10:21:10',1,43,0,'鸡蛋汤 1份 紫菜汤 1份','逾期未支付订单将自动取消',NULL,20,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(25,4,52,'五组饭店','15555555555',1,'2017-07-20 10:23:28',1,43,0,'鸡蛋汤 1份 紫菜汤 1份','逾期未支付订单将自动取消',NULL,20,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(26,4,52,'五组饭店','15555555555',1,'2017-07-20 10:25:01',1,43,0,'鸡蛋汤 1份 紫菜汤 1份','逾期未支付订单将自动取消',NULL,20,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(27,4,52,'五组饭店','15555555555',1,'2017-07-20 10:36:09',1,43,0,'紫菜汤 1份 鸡蛋汤 1份','逾期未支付订单将自动取消',NULL,20,7,'18:30',NULL,1,1,'无','备注','0000-00-00 00:00:00'),(28,4,52,'五组饭店','15555555555',1,'2017-07-21 04:56:50',1,94,0,'紫菜汤 3份 打烤翅 1份','逾期未支付订单将自动取消','2017-07-21 07:22:25',20,7,'18:30',NULL,1,1,'无','备注','2017-07-20 13:07:46'),(29,4,52,'五组饭店','15555555555',1,'2017-07-21 05:28:39',1,88,0,'紫菜汤 1份 打烤翅 1份','逾期未支付订单将自动取消','2017-07-21 07:43:33',20,7,'18:30',NULL,1,1,'无','备注','2017-07-20 13:28:55');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packet`
--

DROP TABLE IF EXISTS `packet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packet`
--

LOCK TABLES `packet` WRITE;
/*!40000 ALTER TABLE `packet` DISABLE KEYS */;
/*!40000 ALTER TABLE `packet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packet_type`
--

DROP TABLE IF EXISTS `packet_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packet_type` (
  `id` int(11) NOT NULL COMMENT '主键',
  `amount` int(11) DEFAULT '0' COMMENT '金额',
  `condition` int(11) DEFAULT '100' COMMENT '满多少才可用amount',
  `type` smallint(6) DEFAULT '0' COMMENT '普通红包0, 首单红包1',
  `time_limit` int(11) DEFAULT '30' COMMENT '时限(天数), 多少天后过期',
  `restriction` smallint(6) DEFAULT '0' COMMENT '0,1,2,3,4使用限制, 后台自定义(逻辑)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packet_type`
--

LOCK TABLES `packet_type` WRITE;
/*!40000 ALTER TABLE `packet_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `packet_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `score` int(11) DEFAULT NULL COMMENT '个人积分',
  `red_packet` int(11) DEFAULT NULL COMMENT '红包个数',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `balance` float DEFAULT NULL COMMENT '余额',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (3,3,200,4,NULL,100),(4,4,620,4,'2017-07-18 14:10:10',100),(5,5,9999,22,NULL,166666),(6,6,2312,123,NULL,NULL);
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_n`
--

DROP TABLE IF EXISTS `r_n`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_n` (
  `rid` int(11) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_n`
--

LOCK TABLES `r_n` WRITE;
/*!40000 ALTER TABLE `r_n` DISABLE KEYS */;
INSERT INTO `r_n` VALUES (28,12,8),(28,16,9),(28,17,10),(28,18,11),(28,19,12),(28,20,13),(28,21,14),(28,22,15),(28,23,16),(28,24,17),(28,25,18);
/*!40000 ALTER TABLE `r_n` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `score`
--

DROP TABLE IF EXISTS `score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `score` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id ',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '操作时间',
  `change` int(11) DEFAULT NULL COMMENT '变更',
  `detail` varchar(255) DEFAULT NULL COMMENT '详情',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `score`
--

LOCK TABLES `score` WRITE;
/*!40000 ALTER TABLE `score` DISABLE KEYS */;
/*!40000 ALTER TABLE `score` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_r`
--

DROP TABLE IF EXISTS `u_r`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_r` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_r`
--

LOCK TABLES `u_r` WRITE;
/*!40000 ALTER TABLE `u_r` DISABLE KEYS */;
INSERT INTO `u_r` VALUES (4,20,28),(6,23,27);
/*!40000 ALTER TABLE `u_r` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `register_time` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  `first_login_time` timestamp NULL DEFAULT NULL COMMENT '首次登陆时间',
  `del_time` timestamp NULL DEFAULT NULL COMMENT '软删除时间',
  PRIMARY KEY (`id`,`userid`),
  UNIQUE KEY `uid` (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,3,'hubiteng',0,'ababab','m','13773136524','hubiteng@163.com','sdfa.jpeg',50,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'huchuyao',0,'ababab','m','13376787654','huchuyao@163.com','sdfsdfsdf',100,NULL,NULL,NULL),(3,4,'7479379',0,NULL,NULL,'13773136524',NULL,'test_ele.jpg',NULL,'2017-07-11 04:28:49','2017-07-11 04:28:49',NULL),(4,5,'5669958',0,'123456',NULL,'15136682791',NULL,'test_ele.jpg',NULL,'2017-07-13 23:14:18','2017-07-13 23:14:18',NULL),(5,6,'9118099',0,NULL,NULL,'17801074741',NULL,'test_ele.jpg',NULL,'2017-07-19 07:37:47','2017-07-19 07:37:47',NULL);
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-21 17:15:17
