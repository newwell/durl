-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 05 月 30 日 08:23
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
  `value` text
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
('siteindex9', '2,5,25,Y-n-j  H:i'),
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `durl_systemaction`
--

INSERT INTO `durl_systemaction` (`id`, `fid`, `title`, `action`, `todo`, `do`, `page`, `listnum`) VALUES
(1, 0, '系统设置', '0', '0', '0', '0', 1),
(2, 1, '系统参数设置', 'system_set', 'show', '', 'system_set.inc.php', 1),
(4, 1, '用户管理', 'system_user', 'list', '1', 'system_user.inc.php', 0),
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
(40, 37, '建议反馈', 'help_suggest', NULL, NULL, 'help.inc.php', 0);

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
  `bumen` varchar(50) NOT NULL COMMENT '部门',
  `zhiwei` varchar(50) NOT NULL COMMENT '职位',
  `QQ` varchar(15) NOT NULL COMMENT 'QQ',
  `phone` varchar(40) NOT NULL COMMENT '手机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=250 ;

--
-- 转存表中的数据 `durl_systemuser`
--

INSERT INTO `durl_systemuser` (`id`, `username`, `zname`, `password`, `lastlogintime`, `lastloginip`, `actions`, `userlevel`, `bumen`, `zhiwei`, `QQ`, `phone`) VALUES
(1, 'admin', '管理员', 'e10adc3949ba59abbe56e057f20f883e', 1369912641, '127.0.0.1', 'all', 1, '1', '', '0', '0'),
(24, 'liuwei', '刘维', 'e10adc3949ba59abbe56e057f20f883e', 1330192055, '127.0.0.1', 'system_set,database_query,system_user,vps,m_website', 2, '1', '程序员', '1040811569', '13026105388'),
(245, 'wanghuijun', '王慧君', 'e10adc3949ba59abbe56e057f20f883e', 1324047804, '127.0.0.1', 'all', 3, '5', '前台', '402158246', ''),
(243, 'youjuan', '游娟', 'e10adc3949ba59abbe56e057f20f883e', 1323872067, '127.0.0.1', 'system_user,zhouzhi,announcement', 3, '1', '美工', '347130829', '18702761393'),
(244, 'zhangjuan', '张娟', 'e10adc3949ba59abbe56e057f20f883e', 1324119720, '192.168.1.101', 'system_user,zhouzhi,announcement', 3, '1', '美工', '857824865', ''),
(246, 'yangxinwei', '杨兴伟', 'e10adc3949ba59abbe56e057f20f883e', 1324047906, '127.0.0.1', 'all', 3, '4', '推广员', '292345213', ''),
(247, 'lijingbo', '李敬波', 'e10adc3949ba59abbe56e057f20f883e', 1324052045, '127.0.0.1', 'all', 3, '3', '客服专员', '514822563', ''),
(248, 'liuying', '刘莹', 'e10adc3949ba59abbe56e057f20f883e', 1325930665, '127.0.0.1', 'system_user,zhouzhi,announcement', 3, '2', '推广员', '2295266346', ''),
(249, 'qweqweq', '陈华峰', 'e10adc3949ba59abbe56e057f20f883e', 1330357427, '127.0.0.1', '', 2, '4', '主管', '676529424', '13216546465');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='链接表' AUTO_INCREMENT=151 ;

--
-- 转存表中的数据 `durl_urls`
--

INSERT INTO `durl_urls` (`id`, `url`, `alias`, `add_date`, `annotation`, `times`) VALUES
(32, 'http://app.dazan.cn/', 'dazan', 1369321496, 'a1122', 0),
(34, 'http://www.dazan.cn/module-12.html', 'get', 1369319804, 'asdfasdfasdaaadsa', 0),
(37, 'http://127.0.0.1/test/get_headers.php', 'getQQ', 1369321599, 'asdf', 0),
(39, 'http://app.dazan.cn/', 'daza', 1369321781, 'asdfasdfasdf', 0),
(54, 'http://www.baidu.com\r', NULL, 1369856989, NULL, 0),
(55, 'http://www.dazan.cn\r', NULL, 1369856989, NULL, 0),
(83, 'http://www.taobao.com\r', NULL, 1369857073, NULL, 0),
(61, 'http://www.taobao.com\r', NULL, 1369856989, NULL, 0),
(88, 'http://www.dazan.cn\r', NULL, 1369857148, NULL, 0),
(65, 'http://www.baidu.com\r', NULL, 1369857039, NULL, 0),
(66, 'http://www.dazan.cn\r', NULL, 1369857039, NULL, 0),
(77, 'http://www.dazan.cn\r', NULL, 1369857073, NULL, 0),
(72, 'http://www.taobao.com\r', NULL, 1369857039, NULL, 0),
(76, 'http://www.baidu.com\r', NULL, 1369857073, NULL, 0),
(87, 'http://www.baidu.com\r', NULL, 1369857148, NULL, 0),
(94, 'http://www.taobao.com\r', NULL, 1369857148, NULL, 0),
(98, 'http://www.baidu.com\r', NULL, 1369857155, NULL, 0),
(99, 'http://www.dazan.cn\r', NULL, 1369857155, NULL, 0),
(105, 'http://www.taobao.com\r', NULL, 1369857155, NULL, 0),
(139, 'http://www.baidu.com', NULL, 1369913156, NULL, 0),
(149, 'http://www.baidu.com', NULL, 1369914849, NULL, 0),
(136, 'http://www.taobao.com', NULL, 1369913087, NULL, 0),
(135, 'http://www.dazan.cn', NULL, 1369913087, NULL, 0),
(134, 'http://www.taobao.com', NULL, 1369913075, NULL, 0),
(133, 'http://www.dazan.cn', NULL, 1369913075, NULL, 0),
(132, 'http://www.taobao.com', NULL, 1369913004, NULL, 0),
(131, 'http://www.dazan.cn', NULL, 1369913004, NULL, 0),
(130, 'http://www.taobao.com', NULL, 1369912923, NULL, 0),
(129, 'http://www.dazan.cn', NULL, 1369912923, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
