/*
Navicat MariaDB Data Transfer

Source Server         : 03.Localhost
Source Server Version : 100138
Source Host           : localhost:3306
Source Database       : laravel

Target Server Type    : MariaDB
Target Server Version : 100138
File Encoding         : 65001

Date: 2019-02-11 20:35:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) unsigned DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `weight` int(10) unsigned DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', null, 'Главная', '/', '98');
INSERT INTO `menu` VALUES ('2', null, 'Обо мне', '/about', '99');
INSERT INTO `menu` VALUES ('3', null, 'Авторизация', '#', '100');
INSERT INTO `menu` VALUES ('4', '3', 'Регистрация', '/register', '100');
INSERT INTO `menu` VALUES ('5', '3', 'Вход', '/auth', '100');
INSERT INTO `menu` VALUES ('6', null, 'Обратная связь', '/feedback', '101');
