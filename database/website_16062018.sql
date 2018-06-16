/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 50719
Source Host           : localhost:3307
Source Database       : website

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-06-17 01:11:24
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `roleactions`
-- ----------------------------
DROP TABLE IF EXISTS `roleactions`;
CREATE TABLE `roleactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMinRole` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMinRole` (`idMinRole`),
  CONSTRAINT `roleactions_ibfk_1` FOREIGN KEY (`idMinRole`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roleactions
-- ----------------------------
INSERT INTO `roleactions` VALUES ('1', '1', 'Account bearbeiten', 'action/account');
INSERT INTO `roleactions` VALUES ('2', '9999', 'Rollen verteilen', 'action/admin');
INSERT INTO `roleactions` VALUES ('3', '2', 'DayZ-Codes verwalten', 'action/dayz_codes');
INSERT INTO `roleactions` VALUES ('4', '4', 'Server-Controll', 'action/server');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'User');
INSERT INTO `roles` VALUES ('2', 'ZTFG');
INSERT INTO `roles` VALUES ('3', 'GameMaster');
INSERT INTO `roles` VALUES ('4', 'Serverleitung');
INSERT INTO `roles` VALUES ('9999', 'WebAdmin');

-- ----------------------------
-- Table structure for `userroles`
-- ----------------------------
DROP TABLE IF EXISTS `userroles`;
CREATE TABLE `userroles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idRole` (`idRole`),
  CONSTRAINT `userroles_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  CONSTRAINT `userroles_ibfk_2` FOREIGN KEY (`idRole`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of userroles
-- ----------------------------
INSERT INTO `userroles` VALUES ('1', '7', '2');
INSERT INTO `userroles` VALUES ('2', '7', '9999');
INSERT INTO `userroles` VALUES ('3', '13', '9999');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'test', 'test@test.ch', '123', '2018-06-14 16:36:11', null);
INSERT INTO `users` VALUES ('2', 'goel', 'joel.klingler@hotmail.com', '$2y$10$kArsgmaCOIiES8Chh1yap.jR8LcTbjtiehF/US31nJc.6bRhMcgBa', '2018-06-14 15:43:15', null);
INSERT INTO `users` VALUES ('3', 'rabak', 'adsf@asfd.ch', '$2y$10$95uCj/pWWLhOGB8eCgCgLOQRq84sN/NqXeWy7cXv.l8jIsgXTXXlW', '2018-06-14 15:46:05', null);
INSERT INTO `users` VALUES ('4', 'Ale', 'ale@ale.ch', '$2y$10$fFbEkDBAxKj0JxL6oYU56O5mprNYrPLXA/oR4Iburu81q1UwdhVwa', '2018-06-14 15:49:27', null);
INSERT INTO `users` VALUES ('5', 'Ale', 'ale2@ale.ch', '$2y$10$dDwRZMym0nM.u0FQ7D80FOKoGClSCs01NOJcwyZLy1ZCB/G3eHlkq', '2018-06-14 15:50:12', null);
INSERT INTO `users` VALUES ('6', 'nils', 'asdfsdaf@asfdsd.ch', '$2y$10$Do2.kNl8aJPTiVagEmfnEuvsH/KFjdjjSLotpjwhmavCg90NOixd.', '2018-06-14 15:56:10', null);
INSERT INTO `users` VALUES ('7', 'goel', 'sid.kling@hotmail.com', '$2y$10$Yj2mvVZlh5YwoMqnhO4xROs9e4EffRI8glHTOaDLUNX.2s59.aif.', '2018-06-15 17:02:34', '2018-06-17 01:06:01');
INSERT INTO `users` VALUES ('8', 'musig', 'alessandromusig@hotmail.com', '$2y$10$WYqSDm8jt5HqraVxpqaaIOF861ixY2HXmwyXYpEnsMuMBIDa6tDF.', '2018-06-15 18:11:35', '2018-06-15 18:13:09');
INSERT INTO `users` VALUES ('9', 'testing', 'test@test.test', '$2y$10$PbBklYENjco7dZ2irZpTx.QREui1ED7EyGRINl2qyU2nSa5pjGgiW', '2018-06-15 20:40:50', '2018-06-16 18:13:48');
INSERT INTO `users` VALUES ('10', '1', '11@test.de', '$2y$10$oTYjBkX20MTwAmDUUSGNheG29p0T2tVnl6bSfrwoGakM9TeL3MNR2', '2018-06-15 22:49:11', null);
INSERT INTO `users` VALUES ('11', 'joelstinktdulauch', 'joelstinkt@test.de', '$2y$10$aXMxR8nEEiBZby26Oa4VnuFtn.lljWMcu/cBX.jT/deTS/X0yngzu', '2018-06-15 22:50:00', null);
INSERT INTO `users` VALUES ('12', 'NoReallife', 'noreallife@ztfg.de', '$2y$10$mTkdT/7J2rIwNAvVsHpnCuQ5CGTASAHwEW8jZIltvWwApuJld.T0e', '2018-06-16 21:52:54', '2018-06-16 21:53:11');
INSERT INTO `users` VALUES ('13', 'ztfg', 'ztfg@ztfg.de', '$2y$10$DM6nCbIWccN922re2jtsJO/bzqpGprn1Tpd.2tF4XLHbyK2gSbqsW', '2018-06-17 01:09:44', '2018-06-17 01:10:32');
