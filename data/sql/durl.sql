-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 03 月 23 日 05:45
-- 服务器版本: 5.1.36-community-log
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='设置';

--
-- 转存表中的数据 `durl_settings`
--

INSERT INTO `durl_settings` (`variable`, `value`) VALUES
('sitename', '武汉大赞'),
('sitephone', '027-888888881'),
('siteaddress', '武汉市洪山区阿萨德'),
('siteemail', 's#dazan.cn'),
('sitestatus', '1'),
('siteclosereason', '本站过于牛逼，关闭一下.'),
('siteadminip', ''),
('siteuserip', ''),
('sitetemplate', 'tp01'),
('sitevideoserver', ''),
('siteindex0', '35,4,40,Y-n-j  H:i'),
('siteindex1', '11,8,100,Y-n-j  H:i'),
('siteindex2', '13,5,55,Y-n-j'),
('siteindex3', '18,8,100,Y-n-j  H:i'),
('siteindex4', '38,8,100,Y-n-j  H:i'),
('siteindex5', '14,4,35,Y-n-j'),
('siteindex6', '225,3,25,Y-n-j  H:i'),
('siteindex7', '45,53,25,Y-n-j  H:i'),
('siteindex8', '2,5,25,Y-n-j  H:i'),
('siteindex9', '2,5,25,Y-n-j  H:i'),
('siteurlrewrite', 'htaccess'),
('sitedeclareinfo', 'http://www.dazan.cn'),
('sitebrowser', '建议在IE6以上浏览器 1024*768分辨率下浏览本站'),
('siteqq', '123123123'),
('sitedescription', '网站描述|网站描述|网站描述|网站描述|网站描述|网站描述|网站描述|网站描述|');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
