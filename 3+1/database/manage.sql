/*
Navicat MySQL Data Transfer

Source Server         : php
Source Server Version : 50617
Source Host           : localhost:3308
Source Database       : manage

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-06-12 16:30:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `name` varchar(10) NOT NULL,
  `number` char(10) NOT NULL,
  `class` int(6) NOT NULL,
  `intention` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `content` varchar(20) NOT NULL,
  `telephone` char(20) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('翟永基', '2015154101', '201503', '自主实习', '平定县公安局网络安全保卫大队', '计算机病毒和其它有害数据防治管理', '18735107633');
INSERT INTO `students` VALUES ('韩涛', '2015154105', '201503', '企业实训', '太原联航科技有限公司', '嵌入式系统设计与开发', '18735100278');
INSERT INTO `students` VALUES ('于彤红', '2015154108', '201503', '企业实训', '山西思软科技有限公司', 'java移动互联', '18735125755');
INSERT INTO `students` VALUES ('张杰', '2015154110', '201503', '自主实习', '北京博智科技教育有限公司', '网络运营维护', '18735125975');
INSERT INTO `students` VALUES ('闫子欣', '2015154111', '201503', '企业实训', '软赢', 'java互联网全栈开发', '18734569167');
INSERT INTO `students` VALUES ('刘鹏', '2015154115', '201503', '企业实训', '软赢', 'java互联网全栈开发', '18634788703');

-- ----------------------------
-- Table structure for stufile
-- ----------------------------
DROP TABLE IF EXISTS `stufile`;
CREATE TABLE `stufile` (
  `name` varchar(10) NOT NULL,
  `number` char(10) NOT NULL,
  `class` int(6) NOT NULL,
  `intention` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `content` varchar(20) NOT NULL,
  `telephone` char(20) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of stufile
-- ----------------------------
INSERT INTO `stufile` VALUES ('123', '2015154101', '201503', '456', '46', '465', '456');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', '1234567890', 'root', '4607e782c4d86fd5364d7e4508bb10d9', 'a@q.com');
INSERT INTO `user` VALUES ('4', '2015154101', 'student', 'e10adc3949ba59abbe56e057f20f883e', 'a@q.com');
INSERT INTO `user` VALUES ('6', '1472583690', 'teacher', 'e10adc3949ba59abbe56e057f20f883e', '2@qq.com');
SET FOREIGN_KEY_CHECKS=1;
