-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 06 日 13:10
-- 服务器版本: 5.1.36-community-log
-- PHP 版本: 5.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `durl`
--

-- --------------------------------------------------------

--
-- 表的结构 `durl_settings`
--

CREATE TABLE IF NOT EXISTS `durl_settings` (
  `variable` varchar(32) NOT NULL DEFAULT '',
  `value` text,
  UNIQUE KEY `variable` (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `durl_settings`
--

INSERT INTO `durl_settings` (`variable`, `value`) VALUES
('sitename', '峰易海站务管理系统'),
('sitephone', '13026105388'),
('siteaddress', '湖北省武汉市'),
('siteemail', 'hubei_java@qq.com'),
('sitestatus', '1'),
('siteclosereason', '本网站长的过于风流倜傥,特关闭2小时以面壁思过'),
('siteadminip', ''),
('siteuserip', ''),
('sitetemplate', 'tp01'),
('sitevideoserver', ''),
('siteindex0', '44,1,40,Y-n-j  H:i'),
('siteindex1', '25,6,35,Y-n-j  H:i'),
('siteindex2', '147,9,40,Y-n-j  H:i'),
('siteindex3', '26,4,40,Y-n-j  H:i'),
('siteindex4', '206,4,25,Y-n-j'),
('siteindex5', '207,4,35,Y-n-j'),
('siteindex6', '225,3,25,Y-n-j  H:i'),
('siteindex7', '45,53,25,Y-n-j  H:i'),
('siteindex8', '2,5,25,Y-n-j  H:i'),
('siteurl', 'http://baidu.cn/'),
('siteurlrewrite', 'none'),
('sitedeclareinfo', ''),
('sitebrowser', '建议在IE6以上浏览器 1024*768分辨率下浏览本站'),
('sitehelp', '技术支持：<a href="http://www.51tek.com" target="_blank">湖北华秦教育软件技术有限公司</a>'),
('sitedescription', '峰易海贸易有限公司	站务管理系统'),
('sitekeywords', '峰易海贸易系统'),
('siteqq', '1040811569');

-- --------------------------------------------------------

--
-- 表的结构 `durl_systemaction`
--

CREATE TABLE IF NOT EXISTS `durl_systemaction` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `fid` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `action` varchar(50) NOT NULL DEFAULT '',
  `todo` varchar(255) DEFAULT NULL,
  `do` varchar(255) DEFAULT NULL,
  `page` varchar(255) NOT NULL DEFAULT '',
  `listnum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `durl_systemaction`
--

INSERT INTO `durl_systemaction` (`id`, `fid`, `title`, `action`, `todo`, `do`, `page`, `listnum`) VALUES
(1, 0, '系统设置', '0', '0', '0', '0', 1),
(2, 1, '系统参数设置', 'system_set', 'show', '', 'system_set.inc.php', 1),
(4, 1, '用户管理', 'system_user', 'edituser', '1', 'system_user.inc.php', 0),
(5, 36, '数据库优化', 'database_optimize', 'list', '', 'data.inc.php', 3),
(6, 36, '数据库备份', 'database_backup', 'backup', '', 'data.inc.php', 4),
(35, 29, '批量导入', 'batch_in', 'in', NULL, 'batch.inc.php', 0),
(34, 29, '批量导出', 'batch_out', 'out', NULL, 'batch.inc.php', 0),
(33, 29, '批量添加', 'batch_add', 'add', NULL, 'batch.inc.php', 0),
(32, 28, '还原短网址', 'shorturl_restore', 'restore', NULL, 'shorturl.inc.php', 3),
(31, 28, '添加短网址', 'shorturl_add', 'add', NULL, 'shorturl.inc.php', 2),
(30, 28, '查看所有', 'shorturl_list', 'list', NULL, 'shorturl.inc.php', 1),
(29, 0, '批量操作', '0', '0', '0', '0', 0),
(28, 0, '短网址', '0', '0', '0', '0', 0),
(36, 0, '数据管理', '0', NULL, NULL, '0', 0),
(37, 0, '帮助中心', '0', NULL, NULL, '0', 2),
(38, 37, '如何使用', 'help_manual', NULL, NULL, 'help.inc.php', 0),
(39, 37, '联系我们', 'help_contact', NULL, NULL, 'help.inc.php', 0),
(40, 37, '建议反馈', 'help_suggest', NULL, NULL, 'help.inc.php', 0),
(41, 88, '数据库优化', 'database', 'list', '', 'data.inc.php', 3);

-- --------------------------------------------------------

--
-- 表的结构 `durl_systemuser`
--

CREATE TABLE IF NOT EXISTS `durl_systemuser` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `zname` varchar(50) NOT NULL COMMENT '真实姓名',
  `password` varchar(50) NOT NULL DEFAULT '',
  `lastlogintime` int(10) NOT NULL DEFAULT '0',
  `lastloginip` varchar(40) NOT NULL DEFAULT '',
  `actions` text NOT NULL,
  `userlevel` tinyint(1) NOT NULL DEFAULT '0',
  `QQ` varchar(15) NOT NULL COMMENT 'QQ',
  `email` varchar(255) NOT NULL COMMENT '手机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- 转存表中的数据 `durl_systemuser`
--

INSERT INTO `durl_systemuser` (`id`, `username`, `zname`, `password`, `lastlogintime`, `lastloginip`, `actions`, `userlevel`, `QQ`, `email`) VALUES
(1, 'admin', '刘维', 'eed50d3cecd0c41b29fff87df49f5ace', 1370552331, '127.0.0.1', 'all', 1, '0', 'hubei_java@qq.com'),
(24, 'liuwei', '刘维', 'e10adc3949ba59abbe56e057f20f883e', 1330192055, '127.0.0.1', 'system_set,database_query,system_user,vps,m_website', 2, '1040811569', '13026105388'),
(245, 'wanghuijun', '王慧君', 'e10adc3949ba59abbe56e057f20f883e', 1324047804, '127.0.0.1', 'all', 3, '402158246', ''),
(243, 'youjuan', '游娟', 'e10adc3949ba59abbe56e057f20f883e', 1323872067, '127.0.0.1', 'system_user,zhouzhi,announcement', 3, '347130829', '18702761393'),
(244, 'zhangjuan', '张娟', 'e10adc3949ba59abbe56e057f20f883e', 1324119720, '192.168.1.101', 'system_user,zhouzhi,announcement', 3, '857824865', ''),
(246, 'yangxinwei', '杨兴伟', 'e10adc3949ba59abbe56e057f20f883e', 1324047906, '127.0.0.1', 'all', 3, '292345213', ''),
(247, 'lijingbo', '李敬波', 'e10adc3949ba59abbe56e057f20f883e', 1324052045, '127.0.0.1', 'all', 3, '514822563', ''),
(248, 'liuying', '刘莹', 'e10adc3949ba59abbe56e057f20f883e', 1325930665, '127.0.0.1', 'system_user,zhouzhi,announcement', 3, '2295266346', ''),
(249, 'qweqweq', '陈华峰', 'e10adc3949ba59abbe56e057f20f883e', 1330357427, '127.0.0.1', '', 2, '676529424', '13216546465');

-- --------------------------------------------------------

--
-- 表的结构 `durl_urls`
--

CREATE TABLE IF NOT EXISTS `durl_urls` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `url` text NOT NULL COMMENT '连接地址',
  `alias` varchar(40) DEFAULT NULL COMMENT '别名',
  `add_date` int(10) NOT NULL COMMENT '添加日期',
  `annotation` text COMMENT '注释',
  `times` int(20) DEFAULT '0' COMMENT '次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='链接表' AUTO_INCREMENT=1123 ;

--
-- 转存表中的数据 `durl_urls`
--

INSERT INTO `durl_urls` (`id`, `url`, `alias`, `add_date`, `annotation`, `times`) VALUES
(153, 'http://www.baidu.com', NULL, 1370010810, NULL, 0),
(154, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(156, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(158, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(160, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(162, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(163, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010810, NULL, 0),
(164, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(165, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010810, NULL, 0),
(166, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(168, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(170, 'http://www.dazan.cn', NULL, 1370010810, NULL, 0),
(180, 'http://www.baidu.com', NULL, 1370010815, NULL, 0),
(181, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(182, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(183, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(184, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(185, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(186, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(187, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(188, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(189, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(190, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(191, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(193, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(195, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(197, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(198, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(199, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(200, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(201, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(202, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(203, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(204, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010815, NULL, 0),
(205, 'http://www.dazan.cn', NULL, 1370010815, NULL, 0),
(206, 'http://www.taobao.com', NULL, 1370010815, NULL, 0),
(207, 'http://www.baidu.com', NULL, 1370010819, NULL, 0),
(208, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(209, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(210, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(211, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(212, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(213, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(214, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(216, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(218, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(220, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(221, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(222, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(223, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(224, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(225, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(226, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(227, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(228, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(229, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(230, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(231, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010819, NULL, 0),
(232, 'http://www.dazan.cn', NULL, 1370010819, NULL, 0),
(233, 'http://www.taobao.com', NULL, 1370010819, NULL, 0),
(252, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010822, NULL, 0),
(253, 'http://www.dazan.cn', NULL, 1370010822, NULL, 0),
(254, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010822, NULL, 0),
(255, 'http://www.dazan.cn', NULL, 1370010822, NULL, 0),
(256, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010822, NULL, 0),
(257, 'http://www.dazan.cn', NULL, 1370010822, NULL, 0),
(258, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370010822, NULL, 0),
(259, 'http://www.dazan.cn', NULL, 1370010822, NULL, 0),
(260, 'http://www.taobao.com', NULL, 1370010822, NULL, 0),
(331, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(332, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(333, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(334, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(335, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(336, 'http://www.taobao.com', NULL, 1370279377, '', 0),
(337, 'http://www.baidu.com', NULL, 1370279377, '', 0),
(338, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(339, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(340, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(341, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(342, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(343, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(344, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(345, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(346, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(347, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(348, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(349, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(350, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(351, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(352, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(353, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(354, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(355, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(356, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(357, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(358, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(359, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(360, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(361, 'http://www.taobao.comhttp://www.baidu.com', NULL, 1370279377, '', 0),
(362, 'http://www.dazan.cn', NULL, 1370279377, '', 0),
(363, 'http://www.taobao.com', NULL, 1370279377, '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
