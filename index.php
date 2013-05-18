<?php
session_start();

ob_start();
include 'include/common.inc.php';

//网站关闭功能
//if($setting_sitestatus == 0)
//	stop($setting_siteclosereason);
//表单 hash值
$formhash = formhash();
//在线用户
//online_user();

//访问统计
//$statistic = statistic();

//IP限制
//banip('user');

header("Location:./admincp.php");

//根据导航参数选择不同的操作
switch($action)
{
	case 'class' :
		include 'include/index.inc.php';
		break;
	default:
        //跳转到登陆
		header("Location:./admincp.php");

}


$quernum  = $db->query_num;
$db->close();
unset($db);
// 程序运行信息
$end_time = array_sum(explode(' ',microtime()));
$runtime  = number_format( $end_time - $start_time, 10);
echo "\n<!--  $quernum times query, processed in $runtime second(s)  -->";
ob_flush();
?>