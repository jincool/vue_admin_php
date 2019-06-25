/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : admin

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-06-24 17:24:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(25) NOT NULL COMMENT '菜单栏名字',
  `index` int(11) DEFAULT NULL COMMENT '排序',
  `is_delete` int(11) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='菜单版块';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '党费上划', '2', '0');
INSERT INTO `menu` VALUES ('2', '党费下拨', '0', '0');
INSERT INTO `menu` VALUES ('3', '党费缴纳', '3', '0');
INSERT INTO `menu` VALUES ('4', '系统设置', '4', '0');
INSERT INTO `menu` VALUES ('5', '党费审核', '1', '0');
INSERT INTO `menu` VALUES ('6', '党费添加', '6', '1');
INSERT INTO `menu` VALUES ('8', 'uu', null, '1');

-- ----------------------------
-- Table structure for menu_sub
-- ----------------------------
DROP TABLE IF EXISTS `menu_sub`;
CREATE TABLE `menu_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `sub_name` varchar(25) NOT NULL COMMENT '子菜单名字',
  `component` varchar(25) NOT NULL COMMENT '组件名字',
  `index` int(11) DEFAULT NULL COMMENT '排序',
  `is_delete` int(11) NOT NULL DEFAULT '0' COMMENT '软删除 默认为0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_sub
-- ----------------------------
INSERT INTO `menu_sub` VALUES ('1', '1', '上划申请', 'up_apply', '0', '0');
INSERT INTO `menu_sub` VALUES ('2', '1', '上划审核', 'up_check', '1', '0');
INSERT INTO `menu_sub` VALUES ('3', '2', '下拨申请', 'down_apply', '1', '0');
INSERT INTO `menu_sub` VALUES ('4', '2', '下拨审核', 'down_check', '0', '0');
INSERT INTO `menu_sub` VALUES ('5', '3', '党费缴纳', 'pay_money', null, '0');
INSERT INTO `menu_sub` VALUES ('6', '4', '菜单设置', 'system_menu', null, '0');
INSERT INTO `menu_sub` VALUES ('108', '2', '等等', '', null, '1');
INSERT INTO `menu_sub` VALUES ('109', '2', '等等', '', null, '1');
INSERT INTO `menu_sub` VALUES ('110', '1', '1', '', null, '1');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'zd_admin');
INSERT INTO `role` VALUES ('2', 'pt_user');
INSERT INTO `role` VALUES ('3', 'root');

-- ----------------------------
-- Table structure for role_menu
-- ----------------------------
DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `menu_id` int(11) NOT NULL COMMENT '菜单id''',
  `sub_id` int(11) NOT NULL COMMENT '子菜单id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色菜单表';

-- ----------------------------
-- Records of role_menu
-- ----------------------------
INSERT INTO `role_menu` VALUES ('1', '1', '1', '1');
INSERT INTO `role_menu` VALUES ('2', '1', '1', '2');
INSERT INTO `role_menu` VALUES ('3', '1', '2', '3');
INSERT INTO `role_menu` VALUES ('4', '1', '2', '4');
INSERT INTO `role_menu` VALUES ('5', '2', '3', '5');
INSERT INTO `role_menu` VALUES ('6', '3', '4', '6');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL COMMENT '账号',
  `password` varchar(25) NOT NULL COMMENT '密码',
  `name` varchar(25) DEFAULT NULL COMMENT '用户姓名',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'jincool', '123456', '金酷', '0');
INSERT INTO `user` VALUES ('2', 'eatin', '123456', '依婷', '0');
INSERT INTO `user` VALUES ('3', 'root', '123456', '系统管理员', '0');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1', '1');
INSERT INTO `user_role` VALUES ('2', '2', '2');
INSERT INTO `user_role` VALUES ('3', '3', '3');
