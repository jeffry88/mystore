/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : mystore

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-03-02 13:16:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for je_admin
-- ----------------------------
DROP TABLE IF EXISTS `je_admin`;
CREATE TABLE `je_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(20) DEFAULT NULL,
  `admin_psw` varchar(20) DEFAULT NULL,
  `admin_pic` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of je_admin
-- ----------------------------
INSERT INTO `je_admin` VALUES ('1', '张明', '001', '');

-- ----------------------------
-- Table structure for je_category
-- ----------------------------
DROP TABLE IF EXISTS `je_category`;
CREATE TABLE `je_category` (
  `categroy_id` int(11) NOT NULL,
  `categroy_name` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  PRIMARY KEY (`categroy_id`,`product_id`),
  KEY `FK_Reference_1` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of je_category
-- ----------------------------
INSERT INTO `je_category` VALUES ('1', '小说', '10001', '偷影子的人');
INSERT INTO `je_category` VALUES ('1', '小说', '10002', '围城');
INSERT INTO `je_category` VALUES ('1', '小说', '10003', '杀死一只知更鸟');
INSERT INTO `je_category` VALUES ('1', '小说', '10004', '小王子');
INSERT INTO `je_category` VALUES ('1', '小说', '10005', '追风筝的人');
INSERT INTO `je_category` VALUES ('1', '小说', '10006', '边城');
INSERT INTO `je_category` VALUES ('1', '小说', '10007', '解忧杂货店');
INSERT INTO `je_category` VALUES ('1', '小说', '10008', '嫌疑犯x的献身');
INSERT INTO `je_category` VALUES ('1', '小说', '10009', '三体');
INSERT INTO `je_category` VALUES ('1', '小说', '10010', '呼兰河传');
INSERT INTO `je_category` VALUES ('1', '小说', '10011', '岛上书店');
INSERT INTO `je_category` VALUES ('1', '小说', '10012', '人间失格');
INSERT INTO `je_category` VALUES ('1', '小说', '10013', '挪威的森林');
INSERT INTO `je_category` VALUES ('1', '小说', '10014', '芳华');
INSERT INTO `je_category` VALUES ('1', '小说', '10015', '雪落香杉树');
INSERT INTO `je_category` VALUES ('1', '小说', '10016', '白夜行');
INSERT INTO `je_category` VALUES ('1', '小说', '10017', '月亮和六便士');
INSERT INTO `je_category` VALUES ('1', '小说', '10018', '苏菲的世界');
INSERT INTO `je_category` VALUES ('1', '小说', '10019', '秘密');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20001', '资本论');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20002', '存在与虚无');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20003', '中华人民共和国继承法');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20004', '制度是如何形成的');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20005', '两岸税法比较研究');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20006', '活出生命的意义');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20007', '你心柔软却有力量');
INSERT INTO `je_category` VALUES ('2', '人文社科', '20008', '阿拉伯通史');
INSERT INTO `je_category` VALUES ('3', '文艺', '30001', '油画技法');
INSERT INTO `je_category` VALUES ('3', '文艺', '30002', '梵高传');
INSERT INTO `je_category` VALUES ('3', '文艺', '30003', '蔡澜生活美学三部曲');
INSERT INTO `je_category` VALUES ('3', '文艺', '30004', '马斯克传');
INSERT INTO `je_category` VALUES ('3', '文艺', '30005', '我在等风也在等你');
INSERT INTO `je_category` VALUES ('3', '文艺', '30006', '创造自然');
INSERT INTO `je_category` VALUES ('4', '教育', '40001', 'Java编程思想');
INSERT INTO `je_category` VALUES ('4', '教育', '40002', '每天读一点英文');
INSERT INTO `je_category` VALUES ('4', '教育', '40003', '人力资源管理');
INSERT INTO `je_category` VALUES ('4', '教育', '40004', '普通心理学');
INSERT INTO `je_category` VALUES ('4', '教育', '40005', '内科学');
INSERT INTO `je_category` VALUES ('4', '教育', '40006', '朗文当代高级英文辞典');
INSERT INTO `je_category` VALUES ('5', '经管', '50001', '第五波财富');
INSERT INTO `je_category` VALUES ('5', '经管', '50002', '股票作手回忆录');
INSERT INTO `je_category` VALUES ('5', '经管', '50003', '金字塔原理');
INSERT INTO `je_category` VALUES ('5', '经管', '50004', '管道的故事');
INSERT INTO `je_category` VALUES ('5', '经管', '50005', '国富论');
INSERT INTO `je_category` VALUES ('5', '经管', '50006', '工匠精神');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60001', '希利尔世界史');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60002', '我的成长书');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60003', '14只老鼠大搬家');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60004', '我可以撒谎吗');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60005', '科学全知道');
INSERT INTO `je_category` VALUES ('6', '儿童读物', '60006', '儿童百科全书');
INSERT INTO `je_category` VALUES ('7', '科技', '70001', '天文之书');
INSERT INTO `je_category` VALUES ('7', '科技', '70002', 'spring实战');
INSERT INTO `je_category` VALUES ('7', '科技', '70003', 'c primer plus');
INSERT INTO `je_category` VALUES ('7', '科技', '70004', 'R语言实战');
INSERT INTO `je_category` VALUES ('7', '科技', '70005', 'java从入门到精通');
INSERT INTO `je_category` VALUES ('7', '科技', '70006', '宇宙之美');

-- ----------------------------
-- Table structure for je_order
-- ----------------------------
DROP TABLE IF EXISTS `je_order`;
CREATE TABLE `je_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `price_total` float DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `consignee` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FK_Reference_2` (`product_id`),
  KEY `FK_Reference_3` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of je_order
-- ----------------------------

-- ----------------------------
-- Table structure for je_product
-- ----------------------------
DROP TABLE IF EXISTS `je_product`;
CREATE TABLE `je_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(40) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `product_pic` varchar(40) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60006 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of je_product
-- ----------------------------
INSERT INTO `je_product` VALUES ('10001', '偷影子的人', '.', '14.9', '10001.jpg', '100');
INSERT INTO `je_product` VALUES ('10002', '围城', '.', '22', '10002.jpg', '100');
INSERT INTO `je_product` VALUES ('10003', '杀死一只知更鸟', '.', '20.2', '10003.jpg', '100');
INSERT INTO `je_product` VALUES ('10004', '小王子', '.', '16', '10004.jpg', '100');
INSERT INTO `je_product` VALUES ('10005', '追风筝的人', '啊哈', '20', '10005.jpg', '100');
INSERT INTO `je_product` VALUES ('10006', '边城', '阿道夫', '18.8', '10006.jpg', '100');
INSERT INTO `je_product` VALUES ('10007', '解忧杂货店', '想啊', '23', '10007.jpg', '100');
INSERT INTO `je_product` VALUES ('10008', '嫌疑犯x的献身', '想', '22', '10008.jpg', '100');
INSERT INTO `je_product` VALUES ('10009', '三体', '.', '32', '10009.jpg', '100');
INSERT INTO `je_product` VALUES ('10010', '呼兰河传', '.', '18', '10010.jpg', '100');
INSERT INTO `je_product` VALUES ('10011', '岛上书店', '.', '14', '10011.jpg', '100');
INSERT INTO `je_product` VALUES ('10012', '人间失格', '.', '9.9', '10012.jpg', '100');
INSERT INTO `je_product` VALUES ('10013', '挪威的森林', '.', '21', '10013.jpg', '100');
INSERT INTO `je_product` VALUES ('10014', '芳华', '.', '25', '10014.jpg', '100');
INSERT INTO `je_product` VALUES ('10015', '雪落香杉树', '.', '39', '10015.jpg', '100');
INSERT INTO `je_product` VALUES ('10016', '白夜行', '.', '22', '10016.jpg', '100');
INSERT INTO `je_product` VALUES ('10017', '月亮和六便士', '.', '15.3', '10017.jpg', '100');
INSERT INTO `je_product` VALUES ('10018', '苏菲的世界', '.', '24', '10018.jpg', '100');
INSERT INTO `je_product` VALUES ('10019', '秘密', '.', '25', '10019.jpg', '100');
INSERT INTO `je_product` VALUES ('20001', '资本论', '.', '18', '20001.jpg', '100');
INSERT INTO `je_product` VALUES ('20002', '存在与虚无', '.', '14', '20002.jpg', '100');
INSERT INTO `je_product` VALUES ('20003', '中华人民共和国继承法', '.', '50', '20003.jpg', '100');
INSERT INTO `je_product` VALUES ('20004', '制度是如何形成的', '.', '21', '20004.jpg', '100');
INSERT INTO `je_product` VALUES ('20005', '两岸税法比较研究', '.', '25', '20005.jpg', '100');
INSERT INTO `je_product` VALUES ('20006', '活出生命的意义', '.', '39', '20006.jpg', '100');
INSERT INTO `je_product` VALUES ('20007', '你心柔软却有力量', '.', '22', '20007.jpg', '100');
INSERT INTO `je_product` VALUES ('20008', '阿拉伯通史', '.', '15.3', '20008.jpg', '100');
INSERT INTO `je_product` VALUES ('30001', '油画技法', '.', '18', '30001.jpg', '100');
INSERT INTO `je_product` VALUES ('30002', '梵高传', '.', '14', '30002.jpg', '100');
INSERT INTO `je_product` VALUES ('30003', '蔡澜生活美学三部曲', '.', '50', '30003.jpg', '100');
INSERT INTO `je_product` VALUES ('30004', '马斯克传', '.', '21', '30004.jpg', '100');
INSERT INTO `je_product` VALUES ('30005', '我在等风也在等你', '.', '25', '30005.jpg', '100');
INSERT INTO `je_product` VALUES ('30006', '创造自然', '.', '39', '30006.jpg', '100');
INSERT INTO `je_product` VALUES ('40001', 'Java编程思想', '.', '18', '40001.jpg', '100');
INSERT INTO `je_product` VALUES ('40002', '每天读一点英文', '.', '14', '40002.jpg', '100');
INSERT INTO `je_product` VALUES ('40003', '人力资源管理', '.', '50', '40003.jpg', '100');
INSERT INTO `je_product` VALUES ('40004', '普通心理学', '.', '21', '40004.jpg', '100');
INSERT INTO `je_product` VALUES ('40005', '内科学', '.', '25', '40005.jpg', '100');
INSERT INTO `je_product` VALUES ('40006', '朗文当代高级英文辞典', '.', '39', '40006.jpg', '100');
INSERT INTO `je_product` VALUES ('50001', '第五波财富', '.', '18', '50001.jpg', '100');
INSERT INTO `je_product` VALUES ('50002', '股票作手回忆录', '.', '14', '50002.jpg', '100');
INSERT INTO `je_product` VALUES ('50003', '金字塔原理', '.', '50', '50003.jpg', '100');
INSERT INTO `je_product` VALUES ('50004', '管道的故事', '.', '21', '50004.jpg', '100');
INSERT INTO `je_product` VALUES ('50005', '国富论', '.', '25', '50005.jpg', '100');
INSERT INTO `je_product` VALUES ('50006', '工匠精神', '.', '39', '50006.jpg', '100');
INSERT INTO `je_product` VALUES ('60001', '希利尔世界史', '.', '18', '60001.jpg', '100');
INSERT INTO `je_product` VALUES ('60002', '我的成长书', '.', '14', '60002.jpg', '100');
INSERT INTO `je_product` VALUES ('60003', '14只老鼠大搬家', '.', '50', '60003.jpg', '100');
INSERT INTO `je_product` VALUES ('60004', '我可以撒谎吗', '.', '21', '60004.jpg', '100');
INSERT INTO `je_product` VALUES ('60005', '科学全知道', '.', '25', '60005.jpg', '100');
INSERT INTO `je_product` VALUES ('60006', '儿童百科全书', '.', '39', '60006.jpg', '100');
INSERT INTO `je_product` VALUES ('70001', '天文之书', '.', '18', '70001.jpg', '100');
INSERT INTO `je_product` VALUES ('70002', 'spring实战', '.', '14', '70002.jpg', '100');
INSERT INTO `je_product` VALUES ('70003', 'c primer plus', '.', '50', '70003.jpg', '100');
INSERT INTO `je_product` VALUES ('70004', 'R语言实战', '.', '21', '70004.jpg', '100');
INSERT INTO `je_product` VALUES ('70005', 'java从入门到精通', '.', '25', '70005.jpg', '100');
INSERT INTO `je_product` VALUES ('70006', '宇宙之美', '.', '39', '70006.jpg', '100');

-- ----------------------------
-- Table structure for je_user
-- ----------------------------
DROP TABLE IF EXISTS `je_user`;
CREATE TABLE `je_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) DEFAULT NULL,
  `user_psw` varchar(20) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_pic` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='用户表，用于存储用户信息';

-- ----------------------------
-- Records of je_user
-- ----------------------------
INSERT INTO `je_user` VALUES ('1', '小明', '001', '男', '123@qq.com', null, null);
INSERT INTO `je_user` VALUES ('2', '小华', '002', '男', '456@qq.com', null, null);
INSERT INTO `je_user` VALUES ('3', '小花', '003', '女', '789@qq.com', null, null);
INSERT INTO `je_user` VALUES ('4', '花花', '22', null, '22', null, null);

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  `product_des` varchar(100) NOT NULL,
  `product_pri` float NOT NULL,
  `product_pic` varchar(100) DEFAULT NULL,
  `product_qty` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------

-- ----------------------------
-- Table structure for receive
-- ----------------------------
DROP TABLE IF EXISTS `receive`;
CREATE TABLE `receive` (
  `receive_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `receive_name` varchar(20) NOT NULL,
  `receive_tel` varchar(20) NOT NULL,
  `receive_address` varchar(100) NOT NULL,
  PRIMARY KEY (`receive_id`),
  KEY `receive_fk_01` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receive
-- ----------------------------

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `value` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '1', '1');
INSERT INTO `test` VALUES ('2', '2', '2');
INSERT INTO `test` VALUES ('3', '3', '3');
INSERT INTO `test` VALUES ('4', '4', '4');
INSERT INTO `test` VALUES ('5', '5', '5');
INSERT INTO `test` VALUES ('6', '6', '6');
INSERT INTO `test` VALUES ('7', '7', '7');
INSERT INTO `test` VALUES ('8', '8', '8');
INSERT INTO `test` VALUES ('9', '9', '9');
INSERT INTO `test` VALUES ('10', '10', '10');
INSERT INTO `test` VALUES ('11', '11', '11');
INSERT INTO `test` VALUES ('12', '12', '12');
INSERT INTO `test` VALUES ('13', '13', '13');
INSERT INTO `test` VALUES ('14', '14', '14');
INSERT INTO `test` VALUES ('15', '15', '15');
INSERT INTO `test` VALUES ('16', '16', '16');
INSERT INTO `test` VALUES ('17', '17', '17');
INSERT INTO `test` VALUES ('18', '18', '18');
INSERT INTO `test` VALUES ('19', '19', '19');
INSERT INTO `test` VALUES ('20', '20', '20');
INSERT INTO `test` VALUES ('21', '21', '21');
INSERT INTO `test` VALUES ('22', '22', '22');
INSERT INTO `test` VALUES ('23', '23', '23');
INSERT INTO `test` VALUES ('24', '24', '24');

-- ----------------------------
-- Table structure for torder
-- ----------------------------
DROP TABLE IF EXISTS `torder`;
CREATE TABLE `torder` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `pruduct_num` int(11) NOT NULL,
  `product_total` float NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of torder
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `sex` char(2) DEFAULT NULL,
  `email` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '小明', '001', '男', '123@qq.com');
INSERT INTO `user` VALUES ('2', '小华', '002', '男', '456@qq.com');
INSERT INTO `user` VALUES ('3', '小花', '003', '女', '789@qq.com');
INSERT INTO `user` VALUES ('20', '花花', '222', null, '222');
SET FOREIGN_KEY_CHECKS=1;
