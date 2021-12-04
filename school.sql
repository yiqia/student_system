# Host: localhost  (Version: 5.7.26)
# Date: 2021-12-04 13:04:57
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "qi_admin"
#

DROP TABLE IF EXISTS `qi_admin`;
CREATE TABLE `qi_admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `power` int(11) DEFAULT '0' COMMENT '权限',
  `qq` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Data for table "qi_admin"
#

INSERT INTO `qi_admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e',999,'330729121'),(2,'2018212200','e10adc3949ba59abbe56e057f20f883e',0,NULL),(3,'2018212201','e10adc3949ba59abbe56e057f20f883e',998,NULL);

#
# Structure for table "qi_code"
#

DROP TABLE IF EXISTS `qi_code`;
CREATE TABLE `qi_code` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '二维码标题',
  `url` varchar(255) DEFAULT NULL COMMENT '二维码地址',
  `creat_time` varchar(30) DEFAULT NULL COMMENT '二维码创建时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='二维码表';

#
# Data for table "qi_code"
#

/*!40000 ALTER TABLE `qi_code` DISABLE KEYS */;
INSERT INTO `qi_code` VALUES (1,'出校二维码','http://school.com/code/index','2021-01-21 22:59:33'),(3,'返校二维码','http://www.baidu.com/','2021-01-21 23:10:54'),(4,'进校二维码','http://www.baidu.com/','2021-01-21 23:50:43');
/*!40000 ALTER TABLE `qi_code` ENABLE KEYS */;

#
# Structure for table "qi_log"
#

DROP TABLE IF EXISTS `qi_log`;
CREATE TABLE `qi_log` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(30) DEFAULT NULL COMMENT '标题',
  `creat_time` varchar(30) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='记录';

#
# Data for table "qi_log"
#

/*!40000 ALTER TABLE `qi_log` DISABLE KEYS */;
INSERT INTO `qi_log` VALUES (1,2,'出校二维码','2021-01-21 23:34:12'),(3,2,'进校二维码','2021-01-21 23:53:00'),(4,2,'进校二维码','2021-01-21 23:53:08'),(5,2,'进校二维码','2021-01-21 23:53:45'),(6,2,'进校二维码','2021-01-21 23:54:03'),(7,2,'进校二维码','2021-01-21 23:54:20'),(8,2,'进校二维码','2021-01-21 23:56:28'),(9,2,'进校二维码','2021-01-21 23:58:47'),(10,2,'出校二维码','2021-01-21 23:59:17'),(11,2,'出校二维码','2021-01-23 20:04:02'),(12,2,'出校二维码','2021-03-15 13:17:18');
/*!40000 ALTER TABLE `qi_log` ENABLE KEYS */;

#
# Structure for table "qi_stroke"
#

DROP TABLE IF EXISTS `qi_stroke`;
CREATE TABLE `qi_stroke` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL COMMENT '出发时间',
  `end_time` varchar(50) DEFAULT NULL COMMENT '离开时间',
  `start_address` varchar(100) DEFAULT NULL COMMENT '出发地点',
  `end_address` varchar(100) DEFAULT NULL COMMENT '到达地点',
  `traffic` varchar(50) DEFAULT NULL COMMENT '交通方式',
  `train_number` varchar(30) DEFAULT NULL COMMENT '车次/车号',
  `temperature` varchar(10) DEFAULT NULL COMMENT '温度',
  `creat_time` varchar(30) DEFAULT NULL COMMENT '填写时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='行程';

#
# Data for table "qi_stroke"
#

/*!40000 ALTER TABLE `qi_stroke` DISABLE KEYS */;
INSERT INTO `qi_stroke` VALUES (1,2,'12/30/2020','01/12/2021','aaa','sss','asa','dsa','21','2021-01-21 10:47:53'),(2,2,'01/08/2021','01/12/2021','试试','啊啊','阿松大','阿松大','32','2021-01-21 15:47:53'),(4,1,'01/14/2021','01/19/2021','阿松大','阿松大','阿松大','啊实打实','36.5','2021-01-23 21:24:35');
/*!40000 ALTER TABLE `qi_stroke` ENABLE KEYS */;

#
# Structure for table "qi_student"
#

DROP TABLE IF EXISTS `qi_student`;
CREATE TABLE `qi_student` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `name` varchar(50) DEFAULT NULL COMMENT '姓名',
  `header` varchar(255) DEFAULT 'https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png' COMMENT '头像地址',
  `number` int(11) DEFAULT NULL COMMENT '学号',
  `id_card` varchar(20) DEFAULT NULL COMMENT '身份证',
  `sex` varchar(5) DEFAULT NULL COMMENT '性别',
  `teacher` varchar(30) DEFAULT NULL COMMENT '辅导员',
  `class` varchar(30) DEFAULT NULL COMMENT '班级',
  `dormitory` varchar(50) DEFAULT NULL COMMENT '宿舍',
  `major` varchar(30) DEFAULT NULL COMMENT '专业',
  `college` varchar(50) DEFAULT NULL COMMENT '学院',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

#
# Data for table "qi_student"
#

/*!40000 ALTER TABLE `qi_student` DISABLE KEYS */;
INSERT INTO `qi_student` VALUES (1,'小红','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212204,'511261199902253555','女','李婷','16','A13','软件工程','大数据与软件学院'),(2,'小明','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212201,'51123655556021222','女','李婷','16','A13','计算机科学与技术','大数据与软件学院'),(3,'一奇','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212200,'5116158123852999111','男','李勇','15','A8','软件工程','大数据与软件学院'),(4,'杨小刚','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212215,'511621155548562666','男','王鸥','12','A12-503','数字媒体与技术','大数据与软件学院'),(5,'王小明','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(6,'彭于晏','https://i.loli.net/2021/01/21/Hf92O1NsVrSxLXu.jpg',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(7,'杨洋','https://i.loli.net/2021/01/21/4aZuHfd6TtCoNzR.jpg',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(8,'王俊凯','https://i.loli.net/2021/01/21/NzBipxenRg2YKhZ.jpg',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(10,'王大明','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(11,'王小明6','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(12,'王小明7','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(13,'王小明8','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(14,'王小明9','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(15,'王小明10','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(16,'王小明11','https://i.loli.net/2021/01/20/LNpVwY5ecDQkZ3O.png',2018212311,'511621155548567666','女','王鸥','13','A12-505','数字媒体与技术','大数据与软件学院'),(18,'周杰伦','https://i.loli.net/2021/01/21/8dkeMBSiVORQHw1.jpg',2018245121,'511621155564565555','男','王思聪','18','A13-203','音乐创作','音乐学院'),(19,'刘亦菲','https://i.loli.net/2021/01/21/kJxnIdVSp4eD3rl.jpg',201752123,'511546655561235555','男','王洪','2','A8-145','舞蹈专业','艺术学院');
/*!40000 ALTER TABLE `qi_student` ENABLE KEYS */;

#
# Structure for table "qi_system"
#

DROP TABLE IF EXISTS `qi_system`;
CREATE TABLE `qi_system` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '网站标题',
  `nav_title` varchar(255) DEFAULT NULL COMMENT '左侧导航栏标题',
  `footer` varchar(255) DEFAULT NULL COMMENT '网站底部版权',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "qi_system"
#

/*!40000 ALTER TABLE `qi_system` DISABLE KEYS */;
INSERT INTO `qi_system` VALUES (1,'疫情防控系统','疫情防控系统','2020 - 2021 © by 一奇');
/*!40000 ALTER TABLE `qi_system` ENABLE KEYS */;
