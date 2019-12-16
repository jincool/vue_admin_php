/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : admin

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2019-12-16 14:56:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(55) DEFAULT '',
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES ('1', '0', '清江浦', '0');
INSERT INTO `department` VALUES ('2', '0', '淮阴区', '0');
INSERT INTO `department` VALUES ('3', '1', '城南街道', '0');
INSERT INTO `department` VALUES ('4', '1', '淮三路街道', '0');
INSERT INTO `department` VALUES ('5', '2', '长江路街道', '0');
INSERT INTO `department` VALUES ('6', '2', '王莹街道', '0');
INSERT INTO `department` VALUES ('7', '4', '淮三路社区', '0');
INSERT INTO `department` VALUES ('8', '3', '城南社区', '0');
INSERT INTO `department` VALUES ('9', '5', '威尼斯社区', '0');
INSERT INTO `department` VALUES ('10', '1', '和平街道', '1');
INSERT INTO `department` VALUES ('11', '1', '新亚街道', '1');
INSERT INTO `department` VALUES ('12', '3', '城南社区2', '0');
INSERT INTO `department` VALUES ('13', '3', '城南社区3', '0');
INSERT INTO `department` VALUES ('14', '3', '城南社区4', '1');
INSERT INTO `department` VALUES ('15', '3', '城南社区5', '1');
INSERT INTO `department` VALUES ('16', '3', '城南街道6', '1');
INSERT INTO `department` VALUES ('17', '1', '黄河街道', '1');
INSERT INTO `department` VALUES ('18', '1', '城域街道', '1');
INSERT INTO `department` VALUES ('19', '1', '雨欣街道', '1');
INSERT INTO `department` VALUES ('20', '3', '城南街道7', '1');
INSERT INTO `department` VALUES ('21', '3', '城南街道8', '1');
INSERT INTO `department` VALUES ('22', '3', '城南街道9', '1');
INSERT INTO `department` VALUES ('23', '3', '城南街道10', '1');
INSERT INTO `department` VALUES ('24', '3', '城南街道11', '1');
INSERT INTO `department` VALUES ('25', '1', '商户街道', '1');
INSERT INTO `department` VALUES ('26', '1', '想要街道', '1');
INSERT INTO `department` VALUES ('27', '1', '李湘街道', '1');
INSERT INTO `department` VALUES ('28', '1', '长江路街道', '1');
INSERT INTO `department` VALUES ('29', '1', '哇哈哈街道', '1');
INSERT INTO `department` VALUES ('30', '1', '清明街道', '1');
INSERT INTO `department` VALUES ('31', '3', '城南街道12', '1');
INSERT INTO `department` VALUES ('32', '10', '和平社区', '0');
INSERT INTO `department` VALUES ('33', '1', '长江街道', '1');
INSERT INTO `department` VALUES ('34', '11', '新亚社区', '0');
INSERT INTO `department` VALUES ('35', '1', '王莹街道', '0');
INSERT INTO `department` VALUES ('36', '1', '信息1街道', '1');
INSERT INTO `department` VALUES ('37', '11', '新亚社区2', '1');
INSERT INTO `department` VALUES ('38', '1', '韩城街道', '1');
INSERT INTO `department` VALUES ('39', '1', '空空街道', '1');
INSERT INTO `department` VALUES ('40', '10', '和平社区1', '1');
INSERT INTO `department` VALUES ('41', '10', '和平社区2', '1');
INSERT INTO `department` VALUES ('42', '1', '快乐街道', '1');
INSERT INTO `department` VALUES ('43', '1', '海天街道', '1');
INSERT INTO `department` VALUES ('44', '10', '和平社区3', '1');
INSERT INTO `department` VALUES ('45', '43', '海天社区', '0');
INSERT INTO `department` VALUES ('46', '1', '金酷街道', '1');
INSERT INTO `department` VALUES ('47', '46', '金酷社区', '0');
INSERT INTO `department` VALUES ('48', '34', '新亚会所', '1');
INSERT INTO `department` VALUES ('49', '1', '新城街道', '1');
INSERT INTO `department` VALUES ('50', '2', '淮师街道', '0');
INSERT INTO `department` VALUES ('51', '0', '淮安区', '0');
INSERT INTO `department` VALUES ('52', '0', '涟水县', '0');
INSERT INTO `department` VALUES ('53', '0', '新城县', '0');
INSERT INTO `department` VALUES ('54', '53', '新城街道', '0');
INSERT INTO `department` VALUES ('55', '0', '洪泽区', '0');
INSERT INTO `department` VALUES ('56', '0', 'd', '1');
INSERT INTO `department` VALUES ('57', '0', 'e', '1');
INSERT INTO `department` VALUES ('58', '0', '33', '1');
INSERT INTO `department` VALUES ('59', '0', '1', '1');
INSERT INTO `department` VALUES ('60', '1', '依婷街道', '1');
INSERT INTO `department` VALUES ('61', '0', '金湖县', '0');
INSERT INTO `department` VALUES ('62', '5', '金酷社区', '0');
INSERT INTO `department` VALUES ('63', '12', '城南组', '0');
INSERT INTO `department` VALUES ('64', '0', '盱眙县', '0');
INSERT INTO `department` VALUES ('65', '1', '淮师街道', '1');
INSERT INTO `department` VALUES ('66', '2', '依婷街道', '0');
INSERT INTO `department` VALUES ('101', '1', '城北街道', '0');
INSERT INTO `department` VALUES ('102', '1', '邹总街道', '1');
INSERT INTO `department` VALUES ('103', '4', '淮三路社区2', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='菜单版块';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('4', '系统设置', '6', '0');
INSERT INTO `menu` VALUES ('9', '部门设置', '5', '0');
INSERT INTO `menu` VALUES ('10', '百度搜索', '4', '0');
INSERT INTO `menu` VALUES ('11', '个人主页', null, '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu_sub
-- ----------------------------
INSERT INTO `menu_sub` VALUES ('6', '4', '菜单设置', 'system-menu', null, '0');
INSERT INTO `menu_sub` VALUES ('117', '11', '测试', '132', null, '1');
INSERT INTO `menu_sub` VALUES ('113', '9', '部门管理', 'department-add', null, '0');
INSERT INTO `menu_sub` VALUES ('114', '10', '百度搜索', 'https://www.baidu.com', '0', '0');
INSERT INTO `menu_sub` VALUES ('112', '4', '角色设置', 'system-role', null, '0');
INSERT INTO `menu_sub` VALUES ('115', '9', '用户管理', 'department-user', null, '0');
INSERT INTO `menu_sub` VALUES ('116', '11', '主页', 'index-info', null, '0');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL COMMENT '角色名称',
  `role_level` int(11) DEFAULT NULL COMMENT '角色等级，数值越小权限越大',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '系统管理员', '0', '0');
INSERT INTO `role` VALUES ('2', '市级管理员', '1', '0');
INSERT INTO `role` VALUES ('3', '县区管理员', '2', '0');
INSERT INTO `role` VALUES ('8', '乡镇管理员', '3', '0');
INSERT INTO `role` VALUES ('9', '社区管理员', '4', '0');
INSERT INTO `role` VALUES ('10', '普通用户', '5', '0');

-- ----------------------------
-- Table structure for role_menu
-- ----------------------------
DROP TABLE IF EXISTS `role_menu`;
CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `menu_id` int(11) NOT NULL COMMENT '菜单id''',
  `sub_id` int(11) NOT NULL COMMENT '子菜单id',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='角色菜单表';

-- ----------------------------
-- Records of role_menu
-- ----------------------------
INSERT INTO `role_menu` VALUES ('29', '1', '11', '117', '0');
INSERT INTO `role_menu` VALUES ('30', '2', '11', '116', '0');
INSERT INTO `role_menu` VALUES ('31', '3', '11', '116', '0');
INSERT INTO `role_menu` VALUES ('32', '8', '11', '116', '0');
INSERT INTO `role_menu` VALUES ('33', '9', '11', '116', '0');
INSERT INTO `role_menu` VALUES ('6', '1', '4', '6', '0');
INSERT INTO `role_menu` VALUES ('7', '1', '4', '112', '0');
INSERT INTO `role_menu` VALUES ('12', '7', '4', '112', '0');
INSERT INTO `role_menu` VALUES ('34', '10', '11', '116', '0');
INSERT INTO `role_menu` VALUES ('17', '1', '9', '113', '0');
INSERT INTO `role_menu` VALUES ('18', '1', '10', '114', '0');
INSERT INTO `role_menu` VALUES ('19', '1', '9', '115', '0');
INSERT INTO `role_menu` VALUES ('20', '2', '9', '113', '0');
INSERT INTO `role_menu` VALUES ('21', '2', '9', '115', '0');
INSERT INTO `role_menu` VALUES ('22', '3', '9', '113', '0');
INSERT INTO `role_menu` VALUES ('23', '3', '9', '115', '0');
INSERT INTO `role_menu` VALUES ('24', '9', '9', '115', '0');
INSERT INTO `role_menu` VALUES ('25', '9', '9', '113', '0');
INSERT INTO `role_menu` VALUES ('26', '8', '9', '113', '0');
INSERT INTO `role_menu` VALUES ('27', '8', '9', '115', '0');
INSERT INTO `role_menu` VALUES ('28', '1', '11', '116', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL COMMENT '账号',
  `password` varchar(25) NOT NULL COMMENT '密码',
  `name` varchar(25) DEFAULT NULL COMMENT '用户姓名',
  `department_id` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_name` (`username`,`is_delete`) USING BTREE COMMENT '用户名'
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'jincool', '123456', '金酷', '0', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('2', 'eatin', '123456', '依婷', '1', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('3', 'admin', '123456', '系统管理员', '0', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('4', 'cnjd', '123456', '城南街道', '3', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('5', 'cnsq', '123456', '城南社区', '12', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('6', 'cnsq1', '123456', '城南社区1', '12', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('7', 'hslsq', 'j123456', '淮三路社区1', '7', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('8', 'cool', '123456', '酷酷', '2', '2019-10-22 09:43:24', '0');
INSERT INTO `user` VALUES ('32', 'TING11', 'TING123456', 'TING1', '8', '2019-11-21 16:02:24', '0');
INSERT INTO `user` VALUES ('33', 'TING2', 'TING21', 'TING2', '13', '2019-11-21 16:22:23', '0');
INSERT INTO `user` VALUES ('34', 'cool1', '123456j', 'cool1', '8', '2019-11-21 16:25:42', '0');
INSERT INTO `user` VALUES ('35', 'cool2', '123456j', 'cool2', '3', '2019-11-21 16:26:21', '1');
INSERT INTO `user` VALUES ('36', 'cool3', '123456j', 'cool3', '3', '2019-11-21 16:28:08', '0');
INSERT INTO `user` VALUES ('37', 'tt', '123456j', 'tt', '0', '2019-11-21 16:29:36', '1');

-- ----------------------------
-- Table structure for user_dept
-- ----------------------------
DROP TABLE IF EXISTS `user_dept`;
CREATE TABLE `user_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `dept_level` int(11) DEFAULT NULL COMMENT '部门级别',
  `department_id` int(11) DEFAULT NULL COMMENT '部门id',
  `is_delete` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_dept
-- ----------------------------
INSERT INTO `user_dept` VALUES ('1', '1', '0', '0', '0');
INSERT INTO `user_dept` VALUES ('2', '2', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('3', '3', '0', '0', '0');
INSERT INTO `user_dept` VALUES ('4', '4', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('5', '4', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('6', '5', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('7', '5', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('8', '5', '3', '12', '0');
INSERT INTO `user_dept` VALUES ('9', '6', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('10', '6', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('11', '6', '3', '12', '0');
INSERT INTO `user_dept` VALUES ('12', '7', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('13', '7', '2', '4', '0');
INSERT INTO `user_dept` VALUES ('14', '7', '3', '7', '0');
INSERT INTO `user_dept` VALUES ('15', '8', '1', '2', '0');
INSERT INTO `user_dept` VALUES ('49', '32', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('50', '32', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('51', '32', '3', '8', '0');
INSERT INTO `user_dept` VALUES ('52', '33', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('53', '33', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('54', '33', '3', '13', '0');
INSERT INTO `user_dept` VALUES ('55', '34', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('56', '34', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('57', '34', '3', '8', '0');
INSERT INTO `user_dept` VALUES ('58', '35', '1', '1', '1');
INSERT INTO `user_dept` VALUES ('59', '35', '2', '3', '1');
INSERT INTO `user_dept` VALUES ('60', '36', '1', '1', '0');
INSERT INTO `user_dept` VALUES ('61', '36', '2', '3', '0');
INSERT INTO `user_dept` VALUES ('62', '37', '0', '0', '1');

-- ----------------------------
-- Table structure for user_role
-- ----------------------------
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COMMENT='用户角色表';

-- ----------------------------
-- Records of user_role
-- ----------------------------
INSERT INTO `user_role` VALUES ('1', '1', '2', '0');
INSERT INTO `user_role` VALUES ('2', '2', '3', '0');
INSERT INTO `user_role` VALUES ('3', '3', '1', '0');
INSERT INTO `user_role` VALUES ('4', '4', '8', '0');
INSERT INTO `user_role` VALUES ('5', '5', '9', '0');
INSERT INTO `user_role` VALUES ('6', '6', '9', '0');
INSERT INTO `user_role` VALUES ('7', '7', '9', '0');
INSERT INTO `user_role` VALUES ('8', '8', '3', '0');
INSERT INTO `user_role` VALUES ('31', '32', '9', '0');
INSERT INTO `user_role` VALUES ('32', '33', '9', '0');
INSERT INTO `user_role` VALUES ('33', '34', '9', '0');
INSERT INTO `user_role` VALUES ('34', '35', '9', '1');
INSERT INTO `user_role` VALUES ('35', '36', '8', '0');
INSERT INTO `user_role` VALUES ('36', '37', '2', '1');
