/*
Navicat MySQL Data Transfer

Source Server         : 139.129.252.233
Source Server Version : 50717
Source Host           : 139.129.252.233:3306
Source Database       : xmxz

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-01-22 11:59:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ythink_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ythink_admin`;
CREATE TABLE `ythink_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(255) DEFAULT '',
  `password` char(32) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ythink_admin
-- ----------------------------
INSERT INTO `ythink_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');
