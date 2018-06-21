/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 50719
Source Host           : localhost:3307
Source Database       : website

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-06-22 00:35:30
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `minRoleLevel` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO `actions` VALUES ('1', '2', 'ZTFG-Intern', 'ztfg', 'action');
INSERT INTO `actions` VALUES ('2', '1', 'Account bearbeiten', 'mod_account', 'user/view');
INSERT INTO `actions` VALUES ('3', '5', 'Server-Control-Panel', 'server', 'action');
INSERT INTO `actions` VALUES ('4', '9999', 'Admin-Panel', 'admin', 'action');
INSERT INTO `actions` VALUES ('5', '1', 'Server-Voting', 'public', 'action');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'User', '1');
INSERT INTO `roles` VALUES ('2', 'ZTFG', '2');
INSERT INTO `roles` VALUES ('3', 'GameMaster', '3');
INSERT INTO `roles` VALUES ('4', 'Serverleitung', '5');
INSERT INTO `roles` VALUES ('5', 'Support', '4');
INSERT INTO `roles` VALUES ('6', 'WebAdmin', '9999');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwordhash` varchar(255) NOT NULL,
  `timeStampRegistered` datetime NOT NULL,
  `timeStampLastLogin` datetime DEFAULT NULL,
  `roleId` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_roleId` (`roleId`),
  CONSTRAINT `fk_roleId` FOREIGN KEY (`roleId`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'test', 'test@test.ch', '123', '2018-06-14 16:36:11', null, '2');
INSERT INTO `users` VALUES ('2', 'goel', 'joel.klingler@hotmail.com', '$2y$10$kArsgmaCOIiES8Chh1yap.jR8LcTbjtiehF/US31nJc.6bRhMcgBa', '2018-06-14 15:43:15', null, '2');
INSERT INTO `users` VALUES ('3', 'rabak', 'adsf@asfd.ch', '$2y$10$95uCj/pWWLhOGB8eCgCgLOQRq84sN/NqXeWy7cXv.l8jIsgXTXXlW', '2018-06-14 15:46:05', null, '1');
INSERT INTO `users` VALUES ('4', 'Ale', 'ale@ale.ch', '$2y$10$fFbEkDBAxKj0JxL6oYU56O5mprNYrPLXA/oR4Iburu81q1UwdhVwa', '2018-06-14 15:49:27', '2018-06-21 19:53:11', '2');
INSERT INTO `users` VALUES ('5', 'Ale', 'ale2@ale.ch', '$2y$10$dDwRZMym0nM.u0FQ7D80FOKoGClSCs01NOJcwyZLy1ZCB/G3eHlkq', '2018-06-14 15:50:12', null, '1');
INSERT INTO `users` VALUES ('6', 'nils', 'asdfsdaf@asfdsd.ch', '$2y$10$Do2.kNl8aJPTiVagEmfnEuvsH/KFjdjjSLotpjwhmavCg90NOixd.', '2018-06-14 15:56:10', null, '3');
INSERT INTO `users` VALUES ('7', 'goel', 'sid.kling@hotmail.com', '$2y$10$Yj2mvVZlh5YwoMqnhO4xROs9e4EffRI8glHTOaDLUNX.2s59.aif.', '2018-06-15 17:02:34', '2018-06-17 12:46:25', '2');
INSERT INTO `users` VALUES ('8', 'musig', 'alessandromusig@hotmail.com', '$2y$10$WYqSDm8jt5HqraVxpqaaIOF861ixY2HXmwyXYpEnsMuMBIDa6tDF.', '2018-06-15 18:11:35', '2018-06-15 18:13:09', '1');
INSERT INTO `users` VALUES ('9', 'testing', 'test@test.test', '$2y$10$PbBklYENjco7dZ2irZpTx.QREui1ED7EyGRINl2qyU2nSa5pjGgiW', '2018-06-15 20:40:50', '2018-06-17 16:03:15', '2');
INSERT INTO `users` VALUES ('12', 'NoReallife', 'noreallife@ztfg.de', '$2y$10$mTkdT/7J2rIwNAvVsHpnCuQ5CGTASAHwEW8jZIltvWwApuJld.T0e', '2018-06-16 21:52:54', '2018-06-17 22:01:09', '3');
INSERT INTO `users` VALUES ('13', 'ztfg', 'ztfg@ztfg.de', '$2y$10$maZknY.BkbKA656tWu2Bx.hiPQHm5p9Girjprz5.58N/dtXlCaMs6', '2018-06-17 01:09:44', '2018-06-21 20:27:11', '6');
