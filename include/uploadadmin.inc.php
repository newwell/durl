<?php
/**
 * author：   logan.li
 * E-mail:  realsoft@126.com
 * version: 1.0
 * date:    2009-01-12
 */

set_time_limit(0);

include 'common.inc.php';
function report_error($title, $msg) {
	header("HTTP/1.1 500 $title");
	echo $msg;
	exit;
} 


$month = Date('Ym');

$_FILEDIR = '../video/';

if (!is_dir($_FILEDIR))
	mkdir($_FILEDIR);
// define('UPLOAD_DIRECTORY', '../gears-example/');
if (!is_writeable($_FILEDIR))
	report_error("系统错误", "没找到文件夹");

$filename = '';

$filename2 = $_GET['filename'];

if( is_file($_FILEDIR . $filename2)) {
	echo 0;
	exit();
}

/**
 * Gears 0.4防止BUG出现
 */
// $headers  = array_change_key_case(getallheaders(), CASE_LOWER);
if (!isset($_SERVER['HTTP_CONTENT_DISPOSITION']) || !preg_match('~filename="([\x80-\xff_a-z0-9A-Z\. \-]+)"$~i', $_SERVER['HTTP_CONTENT_DISPOSITION'], $matches))
	report_error('系统错误' , $_SERVER['HTTP_CONTENT_DISPOSITION']);
$filename = iconv('utf-8', 'gbk', $matches[1]);

$fp_dst = @fopen($_FILEDIR . $filename, 'w');
// 就是一个输入流
// 可以获得POST的原始数据
$fp_src = fopen('php://input', 'r');

$length = 0;
while (!feof($fp_src)) {
	$data = fread($fp_src, 1024);
	$length += strlen($data); 
	// echo $length.'read OK';
	fwrite($fp_dst, $data);
} 

fclose($fp_dst);
fclose($fp_src);

echo "上传成功! 写入数据大小 " . $length . " bytes";

require_once 'unzip.class.php';
$z = new Zip;
if (preg_match('/\.zip$/mis', $filename)) {
	$result = $z -> Extract($_FILEDIR . $filename, $_FILEDIR);
	if ($result == -1) {
		echo "\n\n               文件 $filename 解压失败";
	} else {
		echo "\n\n               文件解压成功";
	} 
} 

?>