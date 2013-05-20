<?php
if(!defined('IN_SITE')) exit('Access Denied');
CheckAccess();
global $act,$todo,$tablepre,$db;
admin_priv($act['action']);
require_once 'include/func/shorturl.func.php';
switch ($todo) {
	case 'update':
		$id	= intval( isset($_GET['id']) ? $_GET['id'] : '' );
		if (empty($id)) e('传参错误');
		$durlInfo = shorturl_get(array($id));
		print_r($durlInfo);
		include template('shorturl_update');
		break;
	case 'del':
		$ids   = isset($_POST['ids']) ? $_POST['ids'] : '';
		if (empty($_POST['ids'])) {
			e('请自少选择一项');
		}
		if (shorturl_del($ids)) {
			s('删除成功','?action=shorturl_list&todo=list');
		}
		break;
	case 'list':
	default:
		$page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
		$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 20 );
		if($page > 0){
			$startlimit = ($page - 1) * $perpage;
		}else{
			$startlimit = 0;
		}
		$page_array = array();
		$total		= shorturl_total();
		$page_control = multipage($total,$perpage,$page);
		$durlArr	= shorturl_list($startlimit, $perpage);
		
		include template('shorturl_list');
	break;
}