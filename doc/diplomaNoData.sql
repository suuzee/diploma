/*
Navicat MySQL Data Transfer

Source Server         : my
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : diploma

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-05-22 18:07:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_admins
-- ----------------------------
DROP TABLE IF EXISTS `t_admins`;
CREATE TABLE `t_admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员编号',
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_pwd` varchar(255) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_answers
-- ----------------------------
DROP TABLE IF EXISTS `t_answers`;
CREATE TABLE `t_answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '答案编号',
  `question_id` int(11) DEFAULT NULL COMMENT '问题编号',
  `answer_desc` varchar(255) DEFAULT NULL COMMENT '答案描述',
  `answer_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建答案时间',
  `answer_author` int(11) DEFAULT NULL COMMENT '答案作者',
  `answer_show` int(255) DEFAULT '0' COMMENT '显示答案，默认为0，显示，1为不显示',
  PRIMARY KEY (`answer_id`),
  KEY `question_id` (`question_id`),
  KEY `fk_answer_user` (`answer_author`),
  CONSTRAINT `fk_answer_question` FOREIGN KEY (`question_id`) REFERENCES `t_questions` (`question_id`),
  CONSTRAINT `fk_answer_user` FOREIGN KEY (`answer_author`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_collects
-- ----------------------------
DROP TABLE IF EXISTS `t_collects`;
CREATE TABLE `t_collects` (
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`question_id`),
  KEY `fk_collect_question` (`question_id`),
  CONSTRAINT `fk_collect_question` FOREIGN KEY (`question_id`) REFERENCES `t_questions` (`question_id`),
  CONSTRAINT `fk_collect_user` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_comments
-- ----------------------------
DROP TABLE IF EXISTS `t_comments`;
CREATE TABLE `t_comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论编号',
  `answer_id` int(11) DEFAULT NULL COMMENT '答案编号',
  `comment_desc` varchar(255) DEFAULT NULL COMMENT '评论描述',
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间',
  `comment_author` int(11) DEFAULT NULL COMMENT '评论人',
  PRIMARY KEY (`comment_id`),
  KEY `fk_comment_user` (`comment_author`),
  CONSTRAINT `fk_comment_user` FOREIGN KEY (`comment_author`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_informas
-- ----------------------------
DROP TABLE IF EXISTS `t_informas`;
CREATE TABLE `t_informas` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inform_date` datetime DEFAULT NULL,
  PRIMARY KEY (`answer_id`,`user_id`),
  KEY `fk_informa_user` (`user_id`),
  CONSTRAINT `fk_informa_answer` FOREIGN KEY (`answer_id`) REFERENCES `t_answers` (`answer_id`),
  CONSTRAINT `fk_informa_user` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_informqs
-- ----------------------------
DROP TABLE IF EXISTS `t_informqs`;
CREATE TABLE `t_informqs` (
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inform_date` datetime DEFAULT NULL,
  PRIMARY KEY (`question_id`,`user_id`),
  KEY `fk_informq_user` (`user_id`),
  CONSTRAINT `fk_informq_question` FOREIGN KEY (`question_id`) REFERENCES `t_questions` (`question_id`),
  CONSTRAINT `fk_informq_user` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_likes
-- ----------------------------
DROP TABLE IF EXISTS `t_likes`;
CREATE TABLE `t_likes` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `answer_id` int(11) NOT NULL COMMENT '答案编号',
  PRIMARY KEY (`user_id`,`answer_id`),
  KEY `fk_like_answer` (`answer_id`),
  CONSTRAINT `fk_like_answer` FOREIGN KEY (`answer_id`) REFERENCES `t_answers` (`answer_id`),
  CONSTRAINT `fk_like_user` FOREIGN KEY (`user_id`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_questions
-- ----------------------------
DROP TABLE IF EXISTS `t_questions`;
CREATE TABLE `t_questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题编号',
  `question_title` varchar(255) DEFAULT NULL COMMENT '问题标题',
  `question_desc` text COMMENT '问题描述',
  `question_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建问题时间',
  `question_author` int(11) DEFAULT NULL COMMENT '问题作者',
  `question_look` int(255) DEFAULT '0' COMMENT '问题查看人数',
  `question_show` int(255) DEFAULT '0' COMMENT '问题是否显示，默认为0，显示，1为不显示',
  `question_inform` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `fk_question_user` (`question_author`),
  CONSTRAINT `fk_question_user` FOREIGN KEY (`question_author`) REFERENCES `t_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_tags
-- ----------------------------
DROP TABLE IF EXISTS `t_tags`;
CREATE TABLE `t_tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '标签编号',
  `tag_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_tag_item
-- ----------------------------
DROP TABLE IF EXISTS `t_tag_item`;
CREATE TABLE `t_tag_item` (
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_id`,`question_id`),
  KEY `fk_item_question` (`question_id`),
  CONSTRAINT `fk_item_question` FOREIGN KEY (`question_id`) REFERENCES `t_questions` (`question_id`),
  CONSTRAINT `fk_item_tag` FOREIGN KEY (`tag_id`) REFERENCES `t_tags` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_users
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `user_email` varchar(255) DEFAULT NULL COMMENT '用户邮箱',
  `user_pwd` varchar(255) DEFAULT NULL COMMENT '密码',
  `user_desc` varchar(255) DEFAULT NULL COMMENT '个性签名',
  `user_avatar` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `user_date` timestamp NULL DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
