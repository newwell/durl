<?php
header('X-Powered-By: daZan Network Tech(www.dazan.cn)');
header("Cache-control: private");
header("Content-Type: text/html; charset=UTF-8");

//屏蔽报错
//ini_set("display_errors", "Off");
require_once('config.inc.php');		//配置文件
require_once('fun.inc.php');		//方法库
require_once('template.inc.php');	//模板方法
require_once('db.class.php');		//数据库类

//在这里链接数据库
$db = new db($db_host,$db_user,$db_pass,$db_name,$enable_debugmode);
ob_start();
?>