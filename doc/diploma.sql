/*
Navicat MySQL Data Transfer

Source Server         : my
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : diploma

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-05-22 18:07:31
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
-- Records of t_admins
-- ----------------------------
INSERT INTO `t_admins` VALUES ('1', 'admin', 'admin');

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
-- Records of t_answers
-- ----------------------------
INSERT INTO `t_answers` VALUES ('1', '3', '<p>answerDesc</p>\n', '2016-05-16 10:24:27', '4', '0');
INSERT INTO `t_answers` VALUES ('2', '4', '<p>answerDesc</p>\n', '2016-05-16 10:25:28', '4', '0');
INSERT INTO `t_answers` VALUES ('3', '4', '<p>answerDesc</p>\n', '2016-05-16 10:25:47', '3', '0');
INSERT INTO `t_answers` VALUES ('4', '3', '<p>范德萨暗示法大大三番三方阿萨德发多少撒发的</p>\n', '2016-05-16 03:44:03', '4', '0');
INSERT INTO `t_answers` VALUES ('5', '3', '<p>范德萨暗示法大大三番三方阿萨德发多少撒发的</p>\n', '2016-05-16 03:44:04', '4', '0');
INSERT INTO `t_answers` VALUES ('6', '3', '<p>范德萨暗示法大大三番三方阿萨德发多少撒发的</p>\n', '2016-05-16 03:44:22', '4', '0');
INSERT INTO `t_answers` VALUES ('7', '3', '<p>按时发达的沙发上发生的发多少</p>\n', '2016-05-16 03:45:16', '3', '0');
INSERT INTO `t_answers` VALUES ('8', '3', '<p>打算发大水分散 阿士大夫仨</p>\n', '2016-05-16 03:48:17', '4', '0');
INSERT INTO `t_answers` VALUES ('9', '3', '<p>哈啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊</p>\n', '2016-05-16 03:49:52', '4', '0');
INSERT INTO `t_answers` VALUES ('10', '3', '<p>aahashadsgasdgdasfasdfdasfasdf</p>\n', '2016-05-16 03:51:48', '4', '0');
INSERT INTO `t_answers` VALUES ('11', '3', '<p>aahashadsgasdgdasfasdfdasfasdfdfsadafsfdas</p>\n', '2016-05-16 03:52:45', '4', '0');
INSERT INTO `t_answers` VALUES ('12', '3', '<p>adsfas fsa dfas fdas fads fa sdfdsa</p>\n', '2016-05-16 03:54:26', '4', '0');
INSERT INTO `t_answers` VALUES ('13', '4', '<ol>\n<li>阿斯顿发送到奥的斯发生的是 </li>\n<li>打发斯蒂芬</li>\n</ol>\n<blockquote>\n<p>啊大沙发大沙发打算<br>的萨芬的撒</p>\n</blockquote>\n', '2016-05-21 03:35:16', '5', '0');

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
-- Records of t_collects
-- ----------------------------
INSERT INTO `t_collects` VALUES ('5', '6');

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
-- Records of t_comments
-- ----------------------------
INSERT INTO `t_comments` VALUES ('4', '12', '哈哈哈哈啊啊', '2016-05-16 06:34:51', '4');
INSERT INTO `t_comments` VALUES ('5', '12', '过水电费死个地方官是个', '2016-05-16 06:41:49', '4');
INSERT INTO `t_comments` VALUES ('6', '12', '发大水范德萨', '2016-05-16 06:44:42', '4');
INSERT INTO `t_comments` VALUES ('7', '12', '打发斯蒂芬', '2016-05-16 06:46:14', '4');
INSERT INTO `t_comments` VALUES ('8', '12', '大法撒旦是发送', '2016-05-16 06:46:41', '4');
INSERT INTO `t_comments` VALUES ('9', '11', '大沙发的沙发上', '2016-05-16 06:47:22', '4');
INSERT INTO `t_comments` VALUES ('10', '11', '范德萨法撒旦', '2016-05-16 06:47:55', '4');
INSERT INTO `t_comments` VALUES ('11', '11', '大事发生发送打算的 ', '2016-05-16 06:48:41', '4');
INSERT INTO `t_comments` VALUES ('12', '8', '打算发大水富士达', '2016-05-16 06:55:41', '4');
INSERT INTO `t_comments` VALUES ('13', '7', 'dafda是丰富大厦', '2016-05-16 07:01:53', '4');
INSERT INTO `t_comments` VALUES ('14', '12', '大沙发盛大按时访问', '2016-05-16 07:02:04', '4');
INSERT INTO `t_comments` VALUES ('15', '12', '打算发大水发送', '2016-05-16 07:02:52', '4');
INSERT INTO `t_comments` VALUES ('16', '12', '发起二恶趣味人请问', '2016-05-16 07:02:57', '4');
INSERT INTO `t_comments` VALUES ('17', '11', '啊大沙发', '2016-05-16 07:03:57', '3');
INSERT INTO `t_comments` VALUES ('18', '3', '哈啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', '2016-05-21 03:34:51', '5');
INSERT INTO `t_comments` VALUES ('19', '13', '阿士大夫阿士大夫的萨芬撒 ', '2016-05-21 03:35:28', '5');

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
-- Records of t_informas
-- ----------------------------
INSERT INTO `t_informas` VALUES ('10', '5', '2016-05-22 10:20:07');
INSERT INTO `t_informas` VALUES ('13', '5', '2016-05-22 10:16:33');

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
-- Records of t_informqs
-- ----------------------------
INSERT INTO `t_informqs` VALUES ('3', '5', '2016-05-22 10:03:51');
INSERT INTO `t_informqs` VALUES ('4', '5', '2016-05-22 10:03:23');
INSERT INTO `t_informqs` VALUES ('5', '5', '2016-05-22 10:02:07');
INSERT INTO `t_informqs` VALUES ('6', '5', '2016-05-22 09:56:56');

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
-- Records of t_likes
-- ----------------------------
INSERT INTO `t_likes` VALUES ('5', '3');
INSERT INTO `t_likes` VALUES ('3', '4');
INSERT INTO `t_likes` VALUES ('4', '4');
INSERT INTO `t_likes` VALUES ('3', '5');
INSERT INTO `t_likes` VALUES ('4', '5');
INSERT INTO `t_likes` VALUES ('3', '6');
INSERT INTO `t_likes` VALUES ('4', '6');
INSERT INTO `t_likes` VALUES ('4', '8');
INSERT INTO `t_likes` VALUES ('4', '9');
INSERT INTO `t_likes` VALUES ('4', '12');
INSERT INTO `t_likes` VALUES ('5', '13');

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
-- Records of t_questions
-- ----------------------------
INSERT INTO `t_questions` VALUES ('2', 'qwer', '<ol>\n<li>qewrqerw\\</li>\n<li>qerw</li>\n</ol>\n', '2016-05-14 07:16:22', '4', '1', '0', null);
INSERT INTO `t_questions` VALUES ('3', 'wqerqwer', '<h1 id=\"qewrqewr\">qewrqewr</h1>\n<ol>\n<li>ewqr</li>\n<li>qrew</li>\n<li>qewrqewrwq</li>\n<li>reqeqrw</li>\n</ol>\n', '2016-05-14 07:17:43', '4', '8', '0', null);
INSERT INTO `t_questions` VALUES ('4', '哈哈哈哈哈哈哈哈是一种怎样的体验', '<pre><code class=\"lang-javascrtpt\">console.log(&#39;哈哈哈哈哈哈哈哈是一种怎样的体验哈哈哈哈哈哈哈哈是一种怎样的体验&#39;);\n</code></pre>\n', '2016-05-15 06:47:53', '3', '20', '0', null);
INSERT INTO `t_questions` VALUES ('5', 'adfsdas', '<ol>\n<li><p>dasfads</p>\n</li>\n<li><p>adsfasdfa</p>\n</li>\n<li>adsfadsf</li>\n</ol>\n<pre><code class=\"lang-javascript\">\nconsole.log(&#39;aaaaaaaaaaaaaa&#39;);\n</code></pre>\n', '2016-05-15 08:17:21', '3', '3', '0', null);
INSERT INTO `t_questions` VALUES ('6', '大法师法的地方是阿士大夫阿萨德是', '<ul>\n<li>士大夫撒旦法第三方</li>\n<li>撒旦法撒旦法阿萨德</li>\n<li>阿士大夫阿士大夫撒的</li>\n<li>大撒发的阿萨德fsa 撒的发是打发</li>\n<li>的飞洒发送的是</li>\n</ul>\n', '2016-05-21 03:35:57', '5', '10', '0', null);

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
-- Records of t_tags
-- ----------------------------
INSERT INTO `t_tags` VALUES ('1', '234');
INSERT INTO `t_tags` VALUES ('2', '23');
INSERT INTO `t_tags` VALUES ('3', '123');
INSERT INTO `t_tags` VALUES ('4', '1233');
INSERT INTO `t_tags` VALUES ('5', '234234');
INSERT INTO `t_tags` VALUES ('6', 'weqr');
INSERT INTO `t_tags` VALUES ('7', '345');
INSERT INTO `t_tags` VALUES ('10', '234qwer');
INSERT INTO `t_tags` VALUES ('11', '654');
INSERT INTO `t_tags` VALUES ('12', '432525');
INSERT INTO `t_tags` VALUES ('13', '65454');
INSERT INTO `t_tags` VALUES ('14', '5324345');
INSERT INTO `t_tags` VALUES ('15', '2314');
INSERT INTO `t_tags` VALUES ('16', 'JavaScript');

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
-- Records of t_tag_item
-- ----------------------------
INSERT INTO `t_tag_item` VALUES ('2', '5');
INSERT INTO `t_tag_item` VALUES ('3', '2');
INSERT INTO `t_tag_item` VALUES ('3', '4');
INSERT INTO `t_tag_item` VALUES ('4', '15');
INSERT INTO `t_tag_item` VALUES ('4', '16');
INSERT INTO `t_tag_item` VALUES ('5', '3');
INSERT INTO `t_tag_item` VALUES ('6', '2');
INSERT INTO `t_tag_item` VALUES ('6', '6');

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

-- ----------------------------
-- Records of t_users
-- ----------------------------
INSERT INTO `t_users` VALUES ('1', 'fff@diploma.com', 'fff@diploma.com', '222222', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-15 00:42:23');
INSERT INTO `t_users` VALUES ('2', 'eee@diploma.com', 'eee@diploma.com', '432', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-15 00:42:26');
INSERT INTO `t_users` VALUES ('3', 'ddd@diploma.com', 'ddd@diploma.com', '234', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-15 00:42:28');
INSERT INTO `t_users` VALUES ('4', 'ccc@diploma.com', 'ccc@diploma.com', '134', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-14 06:45:45');
INSERT INTO `t_users` VALUES ('5', 'abc@qunar.com', 'abc@qunar.com', '123456', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-21 03:33:11');
INSERT INTO `t_users` VALUES ('6', 'bbb@diploma.com', 'bbb@diploma.com', '123456', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 11:43:45');
INSERT INTO `t_users` VALUES ('7', 'aaa@diploma.com', 'aaa@diploma.com', '123456', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 11:45:34');
INSERT INTO `t_users` VALUES ('8', 'dfa@diploma.com', 'dfa@diploma.com', '123456', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 11:58:11');
INSERT INTO `t_users` VALUES ('9', 'afa@diploma.com', 'afa@diploma.com', 'abcdef', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 12:00:13');
INSERT INTO `t_users` VALUES ('10', 'asdf@diploma.com', 'asdf@diploma.com', 'asdfasdf', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 12:02:28');
INSERT INTO `t_users` VALUES ('11', 'zhifou@diploma.com', 'zhifou@diploma.com', 'asdf', '这个人很懒...', 'http://q.qunarzz.com/diplomafe/src/images/avatar.jpg', '2016-05-22 12:03:20');
