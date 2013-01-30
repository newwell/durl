<?php
/**
 * 定义根目录
 */
define('BASE_PATH',dirname(__FILE__).DIRECTORY_SEPARATOR);
define('IN_DURL',true);
//皮肤
$skin = 'wui';
/**
 * 定义模板目录
 */
define('TEMPLATES_PATH',BASE_PATH.'source'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.$skin.DIRECTORY_SEPARATOR);
/**
 * 定义缓存目录
 */
define('CACHE_PATH',BASE_PATH.'data'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR);
/**
 * 导入核心文件
 */
//include BASE_PATH.'source'.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR.'common.inc.php';
include 'source/include/common.inc.php';



//开启GZIP压缩
if(Extension_Loaded('zlib')&&IS_SAE) Ob_Start('ob_gzhandler'); 
//得到模块
$_m = isset($_GET['m']) ? trim($_GET['m']) : '';

switch ($_m) {
	case 'index':
	default:
		include template('index');
	break;
}