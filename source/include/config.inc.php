<?php
define("IN_SITE", "TRUE");
//true or false
define("IS_SAE",false);
if (IS_SAE) {
	/*//SAE数据库配置
	$db_host	= SAE_MYSQL_HOST_M.':'.SAE_MYSQL_PORT;
	$db_user	= SAE_MYSQL_USER;
	$db_pass	= SAE_MYSQL_PASS;
	$db_name	= SAE_MYSQL_DB;*/
	
	//BAE数据库配置
	/*从环境变量里取出数据库连接需要的参数*/
	/*$host = getenv('HTTP_BAE_ENV_ADDR_SQL_IP');
	$port = getenv('HTTP_BAE_ENV_ADDR_SQL_PORT');
	
	$db_host = $host.':'.$port;	
	$db_name = 'ZEHnAhygpPJCFEalbDOC';
	$db_user = getenv('HTTP_BAE_ENV_AK');
	$db_pass = getenv('HTTP_BAE_ENV_SK');*/
	
	//站点链接
	$site_url = 'http://chengyu.dazan.cn/';
}else {
	//本地数据库配置
	$db_host	= 'localhost';
	$db_user	= 'root';
	$db_pass	= '';
	$db_name	= 'durl';
	
	//站点链接
	$site_url = 'http://127.0.0.1/bae/souchengyu/1/';
}

//开启数据调试
$enable_debugmode	= false;
//URL重写  true or false
$rewrite_url = true;
//站点链接
$rewrite_url = 'http://localhost/GitHub/durl/';
?>