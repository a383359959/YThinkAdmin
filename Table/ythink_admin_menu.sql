/*
Navicat MySQL Data Transfer

Source Server         : 139.129.252.233
Source Server Version : 50717
Source Host           : 139.129.252.233:3306
Source Database       : xmxz

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-01-22 11:59:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ythink_admin_menu`
-- ----------------------------
DROP TABLE IF EXISTS `ythink_admin_menu`;
CREATE TABLE `ythink_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(255) DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  `icon_class` char(255) DEFAULT 'fa fa-folder-o fa-fw',
  `group` char(255) DEFAULT 'Admin',
  `controller` char(255) DEFAULT '',
  `action` char(255) DEFAULT '',
  `hidden` int(11) DEFAULT '0' COMMENT '隐藏栏目（0：显示 1：隐藏）',
  `condition` char(255) DEFAULT '' COMMENT '条件',
  `index` int(11) DEFAULT '0' COMMENT '是否设为首页（0：默认 1：首页）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='商户左侧菜单表';

-- ----------------------------
-- Records of ythink_admin_menu
-- ----------------------------
INSERT INTO `ythink_admin_menu` VALUES ('1', '登陆', '0', '0', 'fa fa-folder-o fa-fw', 'Admin', 'Index', 'login', '1', '', '0');
